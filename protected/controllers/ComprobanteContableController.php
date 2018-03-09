<?php

class ComprobanteContableController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	public $formLinea;

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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','delete','admin','index','view','cargaCuentas','cargaCuentasJs'),
				'users'=>array('molina'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),										
			),
			);
	}
	
/*	public function actions() {
    return array(
        'getRowForm' => array(
        	'class' => 'ext.dynamictabularform.actions.GetRowForm',
        	'view' => '_rowForm',
        	'modelClass' => 'LineaContable'
        ),
    );
}*/

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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ComprobanteContable']))
		{
			$model->attributes=$_POST['ComprobanteContable'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->NUMERO_COMPROBANTE));
		}

		$this->render('update',array(
			'model'=>$model,
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
}
