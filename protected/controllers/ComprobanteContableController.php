<?php

class ComprobanteContableController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','delete','admin','index','view','cargaCuentas','cargaCuentasJs','Tree'),
				'expression'=>'$user->Administrador()',
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','delete','admin','index','view','cargaCuentas','cargaCuentasJs','Tree'),
				'expression'=>'$user->Contador()',
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','delete','admin','index','view','cargaCuentas','cargaCuentasJs','Tree'),
				'expression'=>'$user->Secretario()',
			),
			array('deny',  // deny all users
				'users'=>array('*'),										
			),
			);
	}
	
public function setMenu($mid) {
        $this->menu = array(
            array('active' => $mid === 'action-c', 'label' => Yii::t('default', 'Crear Comprobante'), 'url' => array('ComprobanteContable/create'),'visible'=>Yii::app()->user->Contador()),
            array('active' => $mid === 'action-r', 'label' => Yii::t('default', 'Actualizar Comprobante'), 'url' => array('ComprobanteContable/admin')),
            array('active' => $mid === 'action-u', 'label' => Yii::t('default', 'Actualizar Comprobante'), 'url' => array('ComprobanteContable/admin')),
            array('active' => $mid === 'action-d', 'label' => Yii::t('default', 'Actualizar Comprobante'), 'url' => array('ComprobanteContable/admin')),
        	
        );
    }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$modelasiento=new LineaContable;

		if(isset($_POST['AsientoContable']))
		{
			$modelasiento->attributes=$_POST['AsientoContable'];
			$modelasiento->NUMERO_COMPROBANTE=$id;
			if($modelasiento->save())
			{
				$this->redirect(array('view','id' =>$id));
			}

		}
		$this->render('view',array(
			'model'=>$this->loadModel($id),
			'modelasiento'=>$modelasiento,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new ComprobanteContable;
		$modelLinea=new LineaContable;
		$msje="";
		if(isset($_POST['ComprobanteContable']))
		{
			$rutEmpresa=$_POST['ComprobanteContable']['RUT_EMPRESA'];
			$tipoComprobante=$_POST['ComprobanteContable']['ID_TIPOCOMP'];
			$glosa=$_POST['ComprobanteContable']['GLOSA_COMPROBANTE'];
			$cuenta=$_POST['Cuenta'];
			$debe=$_POST['Debe'];
			$haber=$_POST['Haber'];

			$sql='INSERT INTO comprobante_contable(ID_TIPOCOMP,RUT_EMPRESA,FECHA_COMPROBANTE,GLOSA_COMPROBANTE)
				   VALUES ('.$tipoComprobante.',"'.$rutEmpresa.'","'.$_POST['ComprobanteContable']['FECHA_COMPROBANTE'].'","'.$glosa.'")';
			Yii::app()->db->createCommand($sql)->execute();
			
			$data=ComprobanteContable::model()->cargaUltimoComprobante();
			$numeroComprobante=$data[0]['numero_comprobante'];
			$sumaDebe=0;
			$sumaHaber=0;
			$resultado=0;
			for ($i=0; $i < count($cuenta) ; $i++) 
			{
				$sumaDebe+=$debe[$i];
				$sumaHaber+=$haber[$i];
			}
			$resultado=$sumaDebe-$sumaHaber;
			if($resultado == 0)
			{
				for ($i=0; $i < count($cuenta) ; $i++) 
				{
					$sql2='INSERT INTO linea_contable(NUMERO_COMPROBANTE,DEBE,HABER,CUENTA)
					VALUES("'.$numeroComprobante.'",'.$debe[$i].','.$haber[$i].','.$cuenta[$i].')';
					Yii::app()->db->createCommand($sql2)->execute();
					$msje="Se ingreso satisfactoriamente el Comprobante";

				}
					echo '<div class="alert alert-success">'.json_encode($msje).'</div>';
			}
			else
			{
				$sql3='DELETE FROM comprobante_contable WHERE NUMERO_COMPROBANTE="'.$numeroComprobante.'"';
				Yii::app()->db->createCommand($sql3)->execute();
				
			}
			
			exit;

		}

        //$this->performAjaxValidation($model);

		$this->render('create',array(
			'model'=>$model,
			'modelLinea'=>$modelLinea,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$modelLinea=LineaContable::model()->findAllByAttributes(array('NUMERO_COMPROBANTE'=>$id));
		if(isset($_POST['ComprobanteContable']))
		{
			foreach ($modelLinea as $key => $value)
			{
				$arrayCuenta[]=$modelLinea[$key]['CUENTA'];
			}
			$fecha=$_POST['FECHA_COMPROBANTE'];
			$debe=$_POST['DEBE'];
			$haber=$_POST['HABER'];
			$i=0;
			$linea=0;
			$sql='UPDATE comprobante_contable SET ID_TIPOCOMP='.$model->ID_TIPOCOMP.', RUT_EMPRESA="'.$model->RUT_EMPRESA.'",FECHA_COMPROBANTE="'.$fecha.'",GLOSA_COMPROBANTE="'.$model->GLOSA_COMPROBANTE.'" WHERE NUMERO_COMPROBANTE='.$id.';';
			Yii::app()->db->createCommand($sql)->execute();
			foreach ($modelLinea as $key => $value) 
			{
				$linea=$modelLinea[$key]['ID_LINEACONTABLE'];
				$sql2='UPDATE linea_contable SET NUMERO_COMPROBANTE="'.$id.'", DEBE='.$debe[$i].', HABER='.$haber[$i].', CUENTA='.$arrayCuenta[$i].' WHERE ID_LINEACONTABLE="'.$linea.'";';
				
				Yii::app()->db->createCommand($sql2)->execute();
				$i++;
			}
			$msje="Se ingreso satisfactoriamente el Comprobante";
			echo '<div class="alert alert-success">'.json_encode($msje).'</div>';
			exit;

		}

		$this->render('update',array(
			'model'=>$model,
			'modelLinea'=>$modelLinea,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('ComprobanteContable');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ComprobanteContable('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ComprobanteContable']))
			$model->attributes=$_GET['ComprobanteContable'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ComprobanteContable the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ComprobanteContable::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ComprobanteContable $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='comprobante-contable-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionCargaCuentas()
	{
		$rutEmpresa=$_POST['ComprobanteContable']['RUT_EMPRESA'];
		$cuentas = cuenta::model()->loadCuentas($rutEmpresa);
        $data     = CHtml::listData($cuentas,'CODIGO_CUENTA','DESCRIPCION_CUENTA');  
        echo CHtml::tag('option',array('value'=>''),'Seleccione',true);
        foreach($data as $value=>$key)  
        {
        	echo CHtml::tag('option',array('value'=>$value),CHtml::encode($key),true);
        }
	}
	public function actionCargaCuentasJs()
	{
		$rutEmpresa=$_POST['id'];
		$cuentas = cuenta::model()->loadCuentas($rutEmpresa);
        $data     = CHtml::listData($cuentas,'CODIGO_CUENTA','DESCRIPCION_CUENTA');  
        echo CHtml::tag('option',array('value'=>''),'Seleccione',true);
        foreach($data as $value=>$key)  
        {
        	echo CHtml::tag('option',array('value'=>$value),CHtml::encode($key),true);
        }
	}
	public function actionTree()
    {
    	$modelLinea=new LineaContable;
    	$rut=$_POST["id"];
    	$model=Cuenta::model()->loadCuentas($rut);
    	$this->renderPartial('_form',array(
			'model'=>$model,
			'modelLinea'=>$modelLinea,
		));
    }
}
