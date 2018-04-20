<?php

class PlanCuentaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public $modelCuenta;
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
				'actions'=>array('create','update','delete','admin','index','view'),
				'expression'=>'$user->Administrador()',
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','delete','admin','index','view'),
				'expression'=>'$user->Contador()',
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
		$model=new PlanCuenta;
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);

		if(isset($_POST['PlanCuenta']))
		{
			$model->attributes=$_POST['PlanCuenta'];
			if($model->save())
			{
		 		$plan = cuenta::model()->planGenerico();
		 		foreach ($plan as $key => $value) 
		 		{
					$sql='INSERT INTO cuenta(CODIGO_CUENTA,ID_TIPOCUENTA,ID_PLANCUENTA,ID_SUBTIPOCUENTA,DESCRIPCION_CUENTA)
						VALUES('.$plan[$key]['CODIGO_CUENTA'].','.$plan[$key]['ID_TIPOCUENTA'].','.$model->ID_PLANCUENTA.','.$plan[$key]['ID_SUBTIPOCUENTA'].',"'.$plan[$key]['DESCRIPCION_CUENTA'].'")';
						Yii::app()->db->createCommand($sql)->execute();
				}	
					$this->redirect(array('//empresa/create','id'=>$model->ID_PLANCUENTA));	
			}
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

		if(isset($_POST['PlanCuenta']))
		{
			$model->attributes=$_POST['PlanCuenta'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID_PLANCUENTA));
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
		$dataProvider=new CActiveDataProvider('PlanCuenta');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PlanCuenta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PlanCuenta']))
			$model->attributes=$_GET['PlanCuenta'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return PlanCuenta the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=PlanCuenta::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param PlanCuenta $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='plan-cuenta-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
