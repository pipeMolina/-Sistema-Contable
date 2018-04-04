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
				'actions'=>array('index',
					'libroMayor',
					'filterLibroMayor',
					'filterExcelLibroMayor',
					'exportarExcelLibroMayor',
					'libroDiario',
					'filterLibroDiario',
					'filterExcelLibroDiario',
					'exportarExcelLibroDiario',
					'balanceGeneral',
					'cargaCuentas',
					'saldoporMes',
					'filterSaldoporMes',
					'filterExcelSaldoporMes',
					'exportarExcelSaldoPorMes',
					),
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
	public function actionExportarExcelLibroDiario()
	{
		$this->renderPartial('libroDiarioExcel');
	}

	public function actionLibroMayor()
	{	
		$this->render('_reportLibroMayor');
	}
	public function actionExportarExcelLibroMayor()
	{
		$this->renderPartial('libroMayorExcel');
	}
	public function actionSaldoporMes()
	{
		$this->render('_reportSaldoporMes');
	}
	public function actionExportarExcelSaldoPorMes()
	{
		$this->renderPartial('_reportSaldoPorMesExcel');
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
		/*Mantiene Valores del filtrado al recargar la pagina*/
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
		@session_start();
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
					$_SESSION['data']=$data;
					$_SESSION['arrayDebe']=$arrayDebe;
					$_SESSION['arrayHaber']=$arrayHaber;
				}
			}	
			echo '<script type="text/javascript"> window.location="'.Yii::app()->baseUrl.'/index.php?r=reportes/ExportarExcelLibroDiario";</script>';		
				
	}

	public function actionFilterLibroMayor()
	{
		@session_start();
		$cuenta=$_POST['hiddenC'];
		$periodo=$_POST['hiddenP'];
		$empresa=$_POST['hiddenE'];
		/*Mantiene Valores del filtrado al recargar la pagina*/
		@$_SESSION['filtro']['empresa']=$_POST['hiddenE'];
		@$_SESSION['filtro']['periodo']=$_POST['hiddenP'];
		@$_SESSION['filtro']['cuenta']=$_POST['hiddenC'];

		$cadena='';
		if(empty($empresa))
		{
			echo '<script language="JavaScript" type="text/javascript">
						alert("Debe elegir Empresa");
			</script>';
		}
		else
			{
				$cadena = 'WHERE lc.cuenta="'.$_POST['hiddenC'].'"';
				if(isset($periodo) && !empty($periodo))
				{
					$cadena =''.$cadena.' AND YEAR(cc.fecha_comprobante)='.$periodo.'';
				}
				
				$data = ComprobanteContable::model()->cargarComprobantesCuenta($cadena);
				if(!empty($data))
				{
				//controla el cambio de Mes
					$referencia=$data[0]["mes"];
					$diferencia=0;
					$valorSaldo=0;
					$arrayListaSaldos=array();
					
					$sumaDebe=0;
					$sumaHaber=0;
					$totalSaldos=0;
					$arrayDebe;
					$arrayHaber;
					$arrayTotalSaldos;
					foreach ($data as $key => $value) 
					{

						if($data[$key]["mes"]!=$referencia)
						{
							$referencia=$data[$key]["mes"];
							$arrayListaSaldos[]=$arraySaldos;
							$arraySaldos=array();

							$arrayDebe[]=$sumaDebe;
							$arrayHaber[]=$sumaHaber;
							$sumaDebe=0;
							$sumaHaber=0;
						}
						$diferencia =$data[$key]["debe"]-$data[$key]["haber"];
						$valorSaldo+=$diferencia;
						$arraySaldos[]=$valorSaldo;

						$sumaDebe += $data[$key]["debe"];
						$sumaHaber += $data[$key]["haber"];

					}
					$arrayListaSaldos[]=$arraySaldos;
					/*Suma columna Saldo*/
					for($i=0;$i<count($arrayListaSaldos);$i++)
					{
						for($j=0;$j<count($arrayListaSaldos[$i]);$j++)
						{
							$totalSaldos+=$arrayListaSaldos[$i][$j];
						}
						$arrayTotalSaldos[]=$totalSaldos;
						$totalSaldos=0;
					}
					$arrayDebe[]=$sumaDebe;
					$arrayHaber[]=$sumaHaber;

					$_SESSION['data']=$data;
					$_SESSION['arrayDebe']=$arrayDebe;
					$_SESSION['arrayHaber']=$arrayHaber;
					$_SESSION['arrayListaSaldos']=$arrayListaSaldos;
					$_SESSION['arrayTotalSaldos']=$arrayTotalSaldos;

				}

				echo '<script type="text/javascript"> window.location="'.Yii::app()->baseUrl.'/index.php?r=reportes/libroMayor";</script>';			
			}

	}
	public function actionFilterExcelLibroMayor()
	{
		@session_start();
		$cuenta=$_POST['hiddenC'];
		$periodo=$_POST['hiddenP'];
		$empresa=$_POST['hiddenE'];
		$cadena='';
		if(empty($empresa))
		{
			echo '<script language="JavaScript" type="text/javascript">
						alert("Debe elegir Empresa");
			</script>';
		}
		else
			{
				$cadena = 'WHERE lc.cuenta="'.$_POST['hiddenC'].'"';
				if(isset($periodo) && !empty($periodo))
				{
					$cadena =''.$cadena.' AND YEAR(cc.fecha_comprobante)='.$periodo.'';
				}
				
				$data = ComprobanteContable::model()->cargarComprobantesCuenta($cadena);
				if(!empty($data))
				{
				//controla el cambio de Mes
					$referencia=$data[0]["mes"];
					$diferencia=0;
					$valorSaldo=0;
					$arrayListaSaldos=array();
					
					$sumaDebe=0;
					$sumaHaber=0;
					$totalSaldos=0;
					$arrayDebe;
					$arrayHaber;
					$arrayTotalSaldos;
					foreach ($data as $key => $value) 
					{

						if($data[$key]["mes"]!=$referencia)
						{
							$referencia=$data[$key]["mes"];
							$arrayListaSaldos[]=$arraySaldos;
							$arraySaldos=array();

							$arrayDebe[]=$sumaDebe;
							$arrayHaber[]=$sumaHaber;
							$sumaDebe=0;
							$sumaHaber=0;
						}
						$diferencia =$data[$key]["debe"]-$data[$key]["haber"];
						$valorSaldo+=$diferencia;
						$arraySaldos[]=$valorSaldo;

						$sumaDebe += $data[$key]["debe"];
						$sumaHaber += $data[$key]["haber"];

					}
					$arrayListaSaldos[]=$arraySaldos;
					/*Suma columna Saldo*/
					for($i=0;$i<count($arrayListaSaldos);$i++)
					{
						for($j=0;$j<count($arrayListaSaldos[$i]);$j++)
						{
							$totalSaldos+=$arrayListaSaldos[$i][$j];
						}
						$arrayTotalSaldos[]=$totalSaldos;
						$totalSaldos=0;
					}
					$arrayDebe[]=$sumaDebe;
					$arrayHaber[]=$sumaHaber;

					$_SESSION['data']=$data;
					$_SESSION['arrayDebe']=$arrayDebe;
					$_SESSION['arrayHaber']=$arrayHaber;
					$_SESSION['arrayListaSaldos']=$arrayListaSaldos;
					$_SESSION['arrayTotalSaldos']=$arrayTotalSaldos;

				}

				echo '<script type="text/javascript"> window.location="'.Yii::app()->baseUrl.'/index.php?r=reportes/ExportarExcelLibroMayor";</script>';			
			}
	}
	public function actionFilterSaldoporMes()
	{
		@session_start();
		$cuenta=$_POST['hiddenC'];
		$periodo=$_POST['hiddenP'];
		$empresa=$_POST['hiddenE'];
		$cadena='';
		/*Mantiene Valores del filtrado al recargar la pagina*/
		@$_SESSION['filtro']['empresa']=$_POST['hiddenE'];
		@$_SESSION['filtro']['periodo']=$_POST['hiddenP'];
		@$_SESSION['filtro']['cuenta']=$_POST['hiddenC'];
		if(empty($empresa))
		{
			echo '<script language="JavaScript" type="text/javascript">
						alert("Debe elegir Empresa");
			</script>';
		}
		else
			{
				$cadena = 'WHERE lc.cuenta="'.$_POST['hiddenC'].'"';
				if(isset($periodo) && !empty($periodo))
				{
					$cadena =''.$cadena.' AND YEAR(cc.fecha_comprobante)='.$periodo.'';
				}
				
				$data = ComprobanteContable::model()->cargarComprobantesCuenta($cadena);
				if(!empty($data))
				{
					//controla el cambio de Mes
					$referencia=$data[0]["mes"];
					$diferencia=0;
					$valorSaldo=0;
					$arrayListaSaldos=array();
					
					$sumaDebe=0;
					$sumaHaber=0;
					$totalSaldos=0;
					$arrayDebe;
					$arrayHaber;
					$arrayTotalSaldos;
					foreach ($data as $key => $value) 
					{

						if($data[$key]["mes"]!=$referencia)
						{
							$referencia=$data[$key]["mes"];
							$arrayListaSaldos[]=$arraySaldos;
							$arraySaldos=array();

							$arrayDebe[]=$sumaDebe;
							$arrayHaber[]=$sumaHaber;
							$sumaDebe=0;
							$sumaHaber=0;
						}
						$diferencia =$data[$key]["debe"]-$data[$key]["haber"];
						$valorSaldo+=$diferencia;
						$arraySaldos[]=$valorSaldo;

						$sumaDebe += $data[$key]["debe"];
						$sumaHaber += $data[$key]["haber"];

					}
					$arrayListaSaldos[]=$arraySaldos;
					/*Suma columna Saldo*/
					for($i=0;$i<count($arrayListaSaldos);$i++)
					{
						for($j=0;$j<count($arrayListaSaldos[$i]);$j++)
						{
							$totalSaldos+=$arrayListaSaldos[$i][$j];
						}
						$arrayTotalSaldos[]=$totalSaldos;
						$totalSaldos=0;
					}
					$arrayDebe[]=$sumaDebe;
					$arrayHaber[]=$sumaHaber;
					$_SESSION['data']=$data;
					$_SESSION['arrayDebe']=$arrayDebe;
					$_SESSION['arrayHaber']=$arrayHaber;
					$_SESSION['arrayListaSaldos']=$arrayListaSaldos;
					$_SESSION['arrayTotalSaldos']=$arrayTotalSaldos;
					
				}
				
				echo '<script type="text/javascript"> window.location="'.Yii::app()->baseUrl.'/index.php?r=reportes/saldoporMes";</script>';			
			}
	}
	public function actionCargaCuentas()
	{
		$rutEmpresa=$_POST['rut'];
		$cuentas = cuenta::model()->loadCuentas($rutEmpresa);
        $data     = CHtml::listData($cuentas,'CODIGO_CUENTA','DESCRIPCION_CUENTA');  
        echo CHtml::tag('option',array('value'=>''),'Elegir Cuenta',true);
        foreach($data as $value=>$key)  
        {
        	echo CHtml::tag('option',array('value'=>$value),CHtml::encode($key),true);
        }
	}
}
?>
