<?php

class UsuarioController extends Controller
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
				'actions'=>array('create','update','delete','admin','index','view'),
				'expression'=>'$user->Administrador()',
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
		$model=new Usuario;
		$modelPersona=new Persona;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		/*if(isset($_POST['Persona'],$_POST['Usuario']))
		{
			$model->attributes=$_POST['Usuario'];
			$modelpersona->RUT_PERSONA=$_POST['Usuario']['RUT_PERSONA'];
			$modelpersona->save();*/
			/*Encriptar contraseña*/
			/*$pass = $model->PASS_USUARIO;
			$shaPass = sha1($pass);
			$md5Pass = md5($shaPass);
			$model->PASS_USUARIO = $md5Pass;
			if($model->save())
				$this->redirect(array('view','id'=>$model->RUT_PERSONA));
		}*/
		if(isset($_POST['Persona'],$_POST['Usuario']))
		{
			$model->attributes=$_POST['Usuario'];
			$modelPersona->attributes=$_POST['Persona'];
			$modelPersona->RUT_PERSONA=$_POST['Usuario']['RUT_PERSONA'];//para que valide
        	$valid=$model->validate();
        	$valid=$modelPersona->validate() && $valid;
			if($valid)
			{
				if($modelPersona->save())
				{
					$model->RUT_PERSONA=$model->RUT_PERSONA;
					$model->PASS_USUARIO=md5($model->PASS_USUARIO); //agregar esta linea antes del save() lo mismo en la funcion de modificar actionUpdate()
					if($model->save())
					{
						$this->redirect(array('view','id'=>$model->RUT_PERSONA));
					}
				}
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'modelPersona'=>$modelPersona,
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

		$modelPersona=Persona::model()->find('RUT_PERSONA=:id',array(':id'=>$id));
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(isset($_POST['Persona'],$_POST['Usuario']))
		{
			$model->attributes=$_POST['Usuario'];
			$modelPersona->attributes=$_POST['Persona'];
			$modelPersona->RUT_PERSONA=$_POST['Usuario']['RUT_PERSONA'];//para que valide
        	$valid=$model->validate();
        	$valid=$modelPersona->validate() && $valid;
        	if($valid)
        	{
				if($modelPersona->save())
				{
					$model->RUT_PERSONA=$model->RUT_PERSONA;
					$model->PASS_USUARIO=md5($model->PASS_USUARIO); //agregar esta linea antes del save() lo mismo en la funcion de modificar actionUpdate()
					if($model->save())
					{
						$this->redirect(array('view','id'=>$model->RUT_PERSONA));
					}
				}
        	}
		}

		$this->render('update',array(
			'model'=>$model,
			'modelPersona'=>$modelPersona
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
		$modelPersona=Persona::model()->deleteByPk($id);

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Usuario');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Usuario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Usuario']))
			$model->attributes=$_GET['Usuario'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Usuario the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Usuario::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Usuario $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='usuario-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
