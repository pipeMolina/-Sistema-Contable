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
				'actions'=>array('index','libroMayor','libroDiario','filterLibroDiario'),
				'users'=>array('molina'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),										
			),
			);
	}


	public function actionLibroMayor()
	{	
		$this->render('_reportLibroMayor');
	}
	public function actionLibroDiario()
	{
		$this->render('_reportLibrodiario');
	}
	public function actionIndex()
	{
		$this->render('index');
	}
	public function actionFilterLibroDiario()
	{
		$mes = $_POST['hiddenM'];
		$rutEmpresa=$_POST['hiddenE'];
		$data=ComprobanteContable::model()->cargarComprobantes($rutEmpresa,$mes);
		var_dump($data);
		die();

	}
}
?>