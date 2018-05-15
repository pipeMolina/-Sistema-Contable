<script type="text/javascript">
    function Asignate(obj){
        var choose = obj.value;
        if(obj.id == 'filterP'){
            document.getElementById('hiddenP').value = choose;
        }
        if(obj.id == 'filterE'){
            document.getElementById('hiddenE').value = choose;
        }
    }
</script>
<?php
	$this->breadcrumbs=array(
		'Reportes'=>array('index'),
		'BalanceGeneral',
	);
?>
<?php @session_start();?>

<div class="row-fluid">
  <div>
    	<table>
    		<tr>
              <td style="min-width:200px;" align="center">
                        <?php echo "Empresa";?>
              </td>
	            <td style="min-width:100px;" align="center">
	                    <?php echo "Año";?>
	            </td>
        	</tr>
        	<tr>
	            <td valign="top" align="center" class="col-lg-4">
                      <?php  
                        echo '<form action=<"'.CController::createUrl('reportes/filterEmp').'" id="formulario4" method="post" name="formulario4">';
                        echo CHtml::dropDownList('filterE',@$_SESSION['filtro']['empresa'],CHtml::listData(Empresa::model()->findAll(array('order'=>'RAZONSOCIAL_EMPRESA')),'RUT_EMPRESA','RAZONSOCIAL_EMPRESA'),array(
                              'empty'=>'Seleccione Empresa',
                              'onchange' => 'Asignate(this)',
                              'class'=>'form-control'
                              ));
                        echo '</form>';
                      ?>

              </td>
                <td valign="top" align="center" class="col-lg-2">
                    <?php /* Filtrado por Año */
                        echo '<form action=<"'.CController::createUrl('reportes/filterYear').'" id="formulario2" method="post" name="formulario2">';
                        $years = array();
                        for($i = date("Y") ; $i>=date("Y")-5; $i--)
                        {
                            $years[$i] = $i;
                        }
                        echo CHtml::dropDownList('filterP',@$_SESSION['filtro']['periodo'],$years,array('empty'=>'Seleccione Año','class'=>'form-control','onchange' => 'Asignate(this)'));  
                        echo '</form>';
                    ?>        
                </td>
                <td valign="top" align="center" class="col-lg-1">
                    <?php
                    
                         echo '<form action=<"'.CController::createUrl('reportes/filterBalanceGeneral').'" id="formulario" method="post" name="formulario">';  
                         echo '<input id="hiddenP" type="hidden" name="hiddenP" value="'.@$_SESSION['filtro']['periodo'].'">';   
                         echo '<input id="hiddenE" type="hidden" name="hiddenE" value="'.@$_SESSION['filtro']['empresa'].'">'; 
                         echo CHtml::ajaxSubmitButton('Buscar',CHtml::normalizeUrl(array('reportes/filterBalanceGeneral')),
                            array(
                                'type'=>'POST',
                                'update' => '#print-total',
                            ),
                            array('type'=>'submit', 'class'=>'btn btn-primary' )
                        );
                        echo '</form>';
                    
                    ?>        
                </td>
                <td valign="top" align="center" class="col-lg-1">
                    <?php
                    
                         echo '<form action=<"'.CController::createUrl('reportes/filterExcelBalanceGeneral').'" id="formulario5" method="post" name="formulario5">';   
                         echo '<input id="hiddenP" type="hidden" name="hiddenP" value="'.@$_SESSION['filtro']['periodo'].'">';   
                         echo '<input id="hiddenE" type="hidden" name="hiddenE" value="'.@$_SESSION['filtro']['empresa'].'">'; 
                        echo CHtml::ajaxSubmitButton('Exportar a Excel',CHtml::normalizeUrl(array('reportes/filterExcelBalanceGeneral')),
                            array(
                                'type'=>'POST',
                                'update' => '#print-total',
                            ),
                            array('type'=>'submit', 'class'=>'btn btn-default' )
                        );
                        echo '</form>';
                    
                    ?>        
                </td>
	        </tr>
    	</table>
    </div>
</br>
<div id="print-total">
<h2 align="center">Balance General:</h2>
<h2 align= "center"><small><?php echo 'Empresa:'.@$_SESSION['filtro']['empresa'].' Año:'.@$_SESSION['filtro']['periodo'].''?></small></h2>
<br></br>
<?php
        $rawDataBG = @$_SESSION['arrayCuentas'];
        $rawDataBGTAc = @$_SESSION['arrayTotalAcumulado'];
        $rawDataBGTG=@$_SESSION['arrayTotalGeneral'];
        $rawDataBGPE=@$_SESSION['perdidaEjercicio'];
        $rawDataBGSI=@$_SESSION['sumasIguales'];
        unset($_SESSION['arrayCuentas']);
        unset($_SESSION['arrayTotalAcumulado']);
        unset($_SESSION['arrayTotalGeneral']);
        unset($_SESSION['perdidaEjercicio']);
        unset($_SESSION['sumasIguales']);

     if (!empty($rawDataBG)) 
        {
          echo '<table class="table table-striped table-hover">
                  <thead>
                    <tr>
                      <th>Cuenta</th>
                      <th></th>
                      <th>Débito</th>
                      <th>Crédito</th>
                      <th>Deudor</th>
                      <th>Acreedor</th>
                      <th>Activos</th>
                      <th>Pasivos</th>
                      <th>Pérdida</th>
                      <th>Ganancia</th>
                    </tr>
                  </thead>
                  <tbody>';
                  $codigoCuenta=0;
                    for($i=0;$i<count($rawDataBG);$i++)
                    {
                      for($j=0;$j<count($rawDataBG[$i]);$j++)
                      {
                        /*Se almacena el codigo cuenta para distinguir los tipos de cuentas */
                        $codigoCuenta=$rawDataBG[$i][0];
                         echo '<tr>
                                      <td>'. $rawDataBG[$i][$j++].'</td>
                                      <td> '.$rawDataBG[$i][$j++].' </td>
                                      <td>'.number_format($rawDataBG[$i][$j++], 0, ",", ".").' </td>
                                      <td>'.number_format($rawDataBG[$i][$j++], 0, ",", ".").' </td>
                                      <td>'.number_format($rawDataBG[$i][$j++], 0, ",", ".").' </td>
                                      <td>'.number_format($rawDataBG[$i][$j++], 0, ",", ".").' </td>
                                      <td>'.number_format($rawDataBG[$i][$j++], 0, ",", ".").' </td>
                                      <td>'.number_format($rawDataBG[$i][$j++], 0, ",", ".").' </td>
                                      <td>'.number_format($rawDataBG[$i][$j++], 0, ",", ".").' </td>
                                      <td> '.number_format($rawDataBG[$i][$j++], 0, ",", ".").' </td>';
                                      
                           echo '</tr>';
                      }
                    } 
                    /*Total Acumulado*/
                    for($i=0;$i<count($rawDataBGTAc);$i++)
                    {
                      echo'<tr>
                            <td>Total Acumulado</td>
                            <td></td>
                            <td>'.number_format($rawDataBGTAc[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataBGTAc[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataBGTAc[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataBGTAc[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataBGTAc[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataBGTAc[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataBGTAc[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataBGTAc[$i++], 0, ",", ".").' </td>
                          </tr>';
                    }
                    /*Total Acumulado*/
                    for($i=0;$i<count($rawDataBGTG);$i++)
                    {
                      echo'<tr>
                            <td>Total General</td>
                            <td></td>
                            <td>'.number_format($rawDataBGTG[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataBGTG[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataBGTG[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataBGTG[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataBGTG[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataBGTG[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataBGTG[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataBGTG[$i++], 0, ",", ".").' </td>
                          </tr>';
                    }
                    /*Perdida de Ejercicio*/
                    for($i=0;$i<count($rawDataBGPE);$i++)
                    {
                      echo'<tr>
                            <td>Perdida Ejercicio</td>
                            <td></td>
                            <td>'.number_format($rawDataBGPE[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataBGPE[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataBGPE[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataBGPE[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataBGPE[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataBGPE[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataBGPE[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataBGPE[$i++], 0, ",", ".").' </td>
                          </tr>';
                    }
                    /*Sumas Iguales*/
                    for($i=0;$i<count($rawDataBGSI);$i++)
                    {
                      echo'<tr>
                            <td>Sumas Iguales</td>
                            <td></td>
                            <td>'.number_format($rawDataBGSI[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataBGSI[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataBGSI[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataBGSI[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataBGSI[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataBGSI[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataBGSI[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataBGSI[$i++], 0, ",", ".").' </td>
                          </tr>';
                    }
            echo '</tbody>';
          echo '</table>';    
        }
        else
          echo "No se encontraron datos con los valores indicados";
        @$_SESSION['filtro']['empresa']="";
        @$_SESSION['filtro']['periodo']="";

?>
</div>
</div>