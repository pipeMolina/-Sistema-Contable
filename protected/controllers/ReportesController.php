<?php 
 class ReportesController extends Controller
 {

 	public $layout='//layouts/column2';

 
public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','libroMayor','libroDiario'),
				'users'=>array('molina'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),										
			),
			);
	}

	public function actionLibroMayor()
	{
		$model="soy el libro mayor";
		
		$this->render('_reportlibroMayor',
			array(
				'model'=>$model,
			));
	}
	public function actionLibroDiario()
	{
		$rawData=ComprobanteContable::model()->cargarComprobantes();

		$this->render('_reportlibrodiario',
			array(
				'rawData'=>$rawData,
			));
	}
	public function actionIndex()
	{
		$this->render('index');
	}
}
?>