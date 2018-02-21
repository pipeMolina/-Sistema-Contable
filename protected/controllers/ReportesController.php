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
				'actions'=>array('index','libroMayor','libroDiario','filterLibroDiario','ExcelLibroDiario'),
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
	public function actionFilterLibroDiario($id)
	{
		@session_start();
		$dia=$_POST['hiddenD'];
		$mes = $_POST['hiddenM'];
		$periodo=$_POST['hiddenP'];
		$empresa=$_POST['hiddenE'];
		@$_SESSION['filtro']['empresa']=$_POST['hiddenE'];

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
					$arrayDebe[]=array();
					$arrayHaber[]=array();
					$i=$data[0]["numero_comprobante"];	
					foreach ($data as $key => $value) 
					{

						if($data[$key]["numero_comprobante"]!=$referencia)
						{
							$arrayDebe[$i]=$sumaDebe;
							$arrayHaber[$i]=$sumaHaber;
							$sumaDebe=0;
							$sumaHaber=0;
							$i=$data[0]["numero_comprobante"];
						}
						$sumaDebe += $data[$key]["debe"];
						$sumaHaber += $data[$key]["haber"];
					}
					
					$_SESSION['data']=$data;
					$_SESSION['arrayDebe']=$arrayDebe;
					$_SESSION['arrayHaber']=$arrayHaber;
				}
				if($id == 0)
				{
					echo '<script type="text/javascript"> window.location="'.Yii::app()->baseUrl.'/index.php?r=reportes/LibroDiario";</script>';	
				}else
				{
					echo '<script type="text/javascript"> window.location="'.Yii::app()->baseUrl.'/index.php?r=reportes/ExcelLibroDiario";</script>';	

				}
			}
	}

	public function actionExcelLibroDiario()
	{
		$tabla[0][0]="cuenta";
		$tabla[0][1]="descripcion";
		$tabla[0][2]="Glosa";
		$tabla[0][3]="Debe";
		$tabla[0][4]="Haber";
		
		$this->renderPartial('libroDiarioExcel',array(
			'tabla'=>$tabla,
			));
	}
}
?>
