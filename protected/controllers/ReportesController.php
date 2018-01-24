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
		$dia=$_POST['hiddenD'];
		$mes = $_POST['hiddenM'];
		$periodo=$_POST['hiddenP'];
		$rutEmpresa=$_POST['hiddenE'];
		$cadena='';
		$filtroP=false;
		$filtroM=false;
		if(empty($rutEmpresa))
		{
			echo '<script language="JavaScript" type="text/javascript">
						alert("Debe elegir Empresa");
			</script>';
		}
			else
			{
				$cadena = 'WHERE cc.rut_empresa="'.$rutEmpresa.'"';
				
				if(isset($periodo) && !empty($periodo))
				{
					$cadena =''.$cadena.' AND YEAR(cc.fecha_comprobante)='.$periodo.'';
					$filtroP = true;
				}
				if(isset($mes) && !empty($mes) && $filtroP == true)
				{
					$cadena =''.$cadena.' AND MONTH(cc.fecha_comprobante)='.$mes.'';
					$filtroM = true;
				}
				if(isset($dia) && !empty($dia) && $filtroM == true)
				{
					$cadena = ''.$cadena.' AND DAY(cc.fecha_comprobante)='.$dia.'';
				}
				$data=ComprobanteContable::model()->cargarComprobantes($cadena);
			}
		
		$this->renderPartial('libroDiario',array(
			'data'=>$data,
			));
	}
}
?>