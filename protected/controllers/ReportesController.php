<?php 
 class ReportesController extends Controller
 {

 	//public $layout='//layouts/column2';

 
public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','libroMayor','libroDiario','filterLibroDiario','filterExcelLibroDiario','ExcelLibroDiario'),
				'users'=>array('molina'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),										
			),
			);
	}


	public function actionIndex()
	{
		$this->render('index');
	}
	public function actionLibroDiario()
	{
		$this->render('_reportLibrodiario');
	}
	public function actionLibroMayor()
	{	
		$this->render('_reportLibroMayor');
	}
	public function actionEstadoResultado()
	{
		$this->render('_reportEstadoResultado');	
	}
	public function actionBalanceGeneral()
	{
		$this->render('_reportBalanceGeneral');
	}
	public function actionFilterLibroDiario()
	{
		@session_start();
		$dia=$_POST['hiddenD'];
		$mes = $_POST['hiddenM'];
		$periodo=$_POST['hiddenP'];
		$empresa=$_POST['hiddenE'];
		@$_SESSION['filtro']['empresa']=$_POST['hiddenE'];
		@$_SESSION['filtro']['periodo']=$_POST['hiddenP'];
		@$_SESSION['filtro']['mes']=$_POST['hiddenM'];
		@$_SESSION['filtro']['dia']=$_POST['hiddenD'];
		$cadena='';
		$filtroP=false;
		$filtroM=false;
		if(empty($empresa))
		{
			echo '<script language="JavaScript" type="text/javascript">
						alert("Debe elegir Empresa");
			</script>';
		}
			else
			{
				$cadena = 'WHERE cc.rut_empresa="'.$_POST['hiddenE'].'"';
				
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
				$data = ComprobanteContable::model()->cargarComprobantes($cadena);
			
				if(!empty($data))
				{
					//controla el cambio de comprobante
					$referencia=$data[0]["numero_comprobante"];
					
					$sumaDebe=0;
					$sumaHaber=0;
					$arrayDebe;
					$arrayHaber;
					foreach ($data as $key => $value) 
					{

						if($data[$key]["numero_comprobante"]!=$referencia)
						{
							$referencia=$data[$key]["numero_comprobante"];
							$arrayDebe[]=$sumaDebe;
							$arrayHaber[]=$sumaHaber;
							$sumaDebe=0;
							$sumaHaber=0;
						}
						$sumaDebe += $data[$key]["debe"];
						$sumaHaber += $data[$key]["haber"];
					}
					$arrayDebe[]=$sumaDebe;
					$arrayHaber[]=$sumaHaber;
					$_SESSION['data']=$data;
					$_SESSION['arrayDebe']=$arrayDebe;
					$_SESSION['arrayHaber']=$arrayHaber;
					
				}

				echo '<script type="text/javascript"> window.location="'.Yii::app()->baseUrl.'/index.php?r=reportes/LibroDiario";</script>';		
			}
	}

	public function actionFilterExcelLibroDiario()
	{
		
		$dia=$_POST['hiddenD'];
		$mes = $_POST['hiddenM'];
		$periodo=$_POST['hiddenP'];
		$empresa=$_POST['hiddenE'];
		$cadena='';
		$filtroP=false;
		$filtroM=false;

		if(empty($empresa))
		{
			echo '<script language="JavaScript" type="text/javascript">
						alert("Debe elegir Empresa");
			</script>';
		}
			else
			{
				$cadena = 'WHERE cc.rut_empresa="'.$_POST['hiddenE'].'"';
				
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
				$data = ComprobanteContable::model()->cargarComprobantes($cadena);
			
				if(!empty($data))
				{
					//controla el cambio de comprobante
					$referencia=$data[0]["numero_comprobante"];
					
					$sumaDebe=0;
					$sumaHaber=0;
					$arrayDebe;
					$arrayHaber;
					foreach ($data as $key => $value) 
					{

						if($data[$key]["numero_comprobante"]!=$referencia)
						{
							$referencia=$data[$key]["numero_comprobante"];
							$arrayDebe[]=$sumaDebe;
							$arrayHaber[]=$sumaHaber;
							$sumaDebe=0;
							$sumaHaber=0;
						}
						$sumaDebe += $data[$key]["debe"];
						$sumaHaber += $data[$key]["haber"];
					}
					$arrayDebe[]=$sumaDebe;
					$arrayHaber[]=$sumaHaber;

				}
			}

		$this->renderPartial('libroDiarioExcel',array(
			'data'=>$data,
			));
	}
}
?>
