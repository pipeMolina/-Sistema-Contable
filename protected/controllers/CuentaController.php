<?php

class CuentaController extends Controller
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','delete','admin','index','view','selectSubtipos','setCodigo'),
				'users'=>array('molina'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),										
			),
			);
	}
	

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Cuenta;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_GET['id']))
			{
			$model->ID_PLANCUENTA=$_GET['id'];
			if(isset($_POST['Cuenta']))
				{
					$model->attributes=$_POST['Cuenta'];

					if($model->save())
						{
							if(isset($_POST['otro']))
							{
								$this->redirect(array('create','id'=>$model->ID_PLANCUENTA));
								
							}
							else
							$this->redirect(array('view','id'=>$model->ID_CUENTA));
						}		
				}
			}
			else
				if(isset($_POST['Cuenta']))
				{
					$model->attributes=$_POST['Cuenta'];

					if($model->save())
						{
							if(isset($_POST['otro']))
							{
								$this->redirect(array('create','id'=>$model->ID_PLANCUENTA));
								
							}
							else
							$this->redirect(array('view','id'=>$model->ID_CUENTA));
						}		
				}
				else
					{
					$model->ID_PLANCUENTA=0;
					}

		$this->render('create',array(
			'model'=>$model,
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

		if(isset($_POST['Cuenta']))
		{
			$model->attributes=$_POST['Cuenta'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID_CUENTA));
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
		$dataProvider=new CActiveDataProvider('Cuenta');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Cuenta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Cuenta']))
			$model->attributes=$_GET['Cuenta'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Cuenta the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Cuenta::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Cuenta $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cuenta-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionselectSubtipos()
	{
		$id_tipocuenta  = $_POST['Cuenta']['ID_TIPOCUENTA'];
        $subtipos = SubtipoCuenta::model()->findAll('ID_TIPOCUENTA=:id_tipocuenta',array(':id_tipocuenta'=> $id_tipocuenta));
        $data     = CHtml::listData($subtipos,'ID_SUBTIPOCUENTA','NOMBRE_SUBTIPOCUENTA');   
        echo CHtml::tag('option',array('value'=>''),'Seleccione',true);
        foreach($data as $value=>$subtipo)  
        {
        	echo CHtml::tag('option',array('value'=>$value),CHtml::encode($subtipo),true);
        }
    }

    public function actionsetCodigo()
    {
    	$id_plan=$_POST["Cuenta"]["ID_PLANCUENTA"];
    	$id_subtipo= $_POST['Cuenta']['ID_SUBTIPOCUENTA'];
    	$codigo_cuenta=SubtipoCuenta::model()->find('ID_SUBTIPOCUENTA=:idsub',array(':idsub'=>$id_subtipo));
    	$codigo=$codigo_cuenta->ID_SUBTIPOCUENTA;
    	$sql='SELECT CODIGO_CUENTA FROM Cuenta WHERE ID_SUBTIPOCUENTA='.$codigo.' ORDER BY CODIGO_CUENTA DESC LIMIT 1;';
    	$connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $dataReader = $command->queryAll();
        foreach ($dataReader as $key => $value)
        {	
       		$sum = $value['CODIGO_CUENTA']+1;
    		echo CHtml::activeTextField(Cuenta::model(),'CODIGO_CUENTA',array('value'=>$sum));	   
        }   
    }
}
 
 
