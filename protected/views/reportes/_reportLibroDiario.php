<script type="text/javascript">
    function Asignate(target){
        var choose = target.value;
        if(target.id == 'filterD'){
            document.getElementById('hiddenD').value = choose;
        }
        if(target.id == 'filterM'){
            document.getElementById('hiddenM').value = choose;
        }
        if(target.id == 'filterP'){
            document.getElementById('hiddenP').value = choose;
        }
        if(target.id == 'filterE'){
            document.getElementById('hiddenE').value = choose;
        }
    }
</script>
<?php
	$this->breadcrumbs=array(
		'Reportes'=>array('index'),
		'LibroDiario',
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
              <td style="min-width:100px;" align="center">
                      <?php echo "Mes";?>
              </td>
              <td style="min-width:100px;" align="center">
                        <?php echo "Día";?>
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
               <td valign="top" align="center" class="col-lg-2">
                      <?php /* Filtrado por Mes */ 
                          echo '<form action=<"'.CController::createUrl('reportes/filterMonth').'" id="formulario1" method="post" name="formulario1">';
                          $meses = array(1=>'Enero',2=>'Febrero',3=>'Marzo',4=>'Abril',5=>'Mayo',6=>'Junio',7=>'Julio',8=>'Agosto',9=>'Septiembre',10=>'Octubre',11=>'Noviembre',12=>'Diciembre');
                          echo CHtml::dropDownList('filterM',@$_SESSION['filtro']['mes'],$meses,array(
                                'empty'=>"Seleccione Mes",
                                'onchange' => 'Asignate(this)',
                                'class'=>'form-control'
                                ));
                          echo '</form>';
                      ?>
              </td>
                <td valign="top" align="center" class="col-lg-2">
                  <?php /* Filtrado por Día */ 
                          echo '<form action=<"'.CController::createUrl('reportes/filterDay').'" id="formulario3" method="post" name="formulario3">';
                          $dias;
                          $count = 1;
                          for($i=1;$i<=31;$i++)
                          {
                              $dias[$i] = $count;
                              $count++;
                          } 
                          echo CHtml::dropDownList('filterD',@$_SESSION['filtro']['dia'],$dias,array(
                              'empty'=> 'Todos',
                              'onchange' => 'Asignate(this)',
                              'class'=>'form-control'
                          ));
                          echo '</form>';
                      ?>
                </td>
                <td valign="top" align="center" class="col-lg-1">
                    <?php
                    
                         echo '<form action=<"'.CController::createUrl('reportes/filterLibroDiario').'" id="formulario" method="post" name="formulario">';
                         echo '<input id="hiddenD" type="hidden" name="hiddenD" value="'.@$_SESSION['filtro']['dia'].'">';   
                         echo '<input id="hiddenM" type="hidden" name="hiddenM" value="'.@$_SESSION['filtro']['mes'].'">';
                         echo '<input id="hiddenP" type="hidden" name="hiddenP" value="'.@$_SESSION['filtro']['periodo'].'">';   
                         echo '<input id="hiddenE" type="hidden" name="hiddenE" value="'.@$_SESSION['filtro']['empresa'].'">'; 
                         echo CHtml::ajaxSubmitButton('Buscar',CHtml::normalizeUrl(array('reportes/filterLibroDiario')),
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
                    
                         echo '<form action=<"'.CController::createUrl('reportes/filterExcelLibroDiario&id=1').'" id="formulario5" method="post" name="formulario5">';
                         echo '<input id="hiddenD" type="hidden" name="hiddenD" value="'.@$_SESSION['filtro']['dia'].'">';   
                         echo '<input id="hiddenM" type="hidden" name="hiddenM" value="'.@$_SESSION['filtro']['mes'].'">';
                         echo '<input id="hiddenP" type="hidden" name="hiddenP" value="'.@$_SESSION['filtro']['periodo'].'">';   
                         echo '<input id="hiddenE" type="hidden" name="hiddenE" value="'.@$_SESSION['filtro']['empresa'].'">'; 
                        echo CHtml::ajaxSubmitButton('Exportar a Excel',CHtml::normalizeUrl(array('reportes/filterExcelLibroDiario&id=1')),
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
<h2 align="center">Libro Diario:</h2>
<h2 align= "center"><small><?php echo 'Dia:'.@$_SESSION['filtro']['dia'].' Mes:'.@$_SESSION['filtro']['mes'].' Año:'.@$_SESSION['filtro']['periodo'].''?></small></h2>
<br></br>
<?php
        $rawData = @$_SESSION['data'];
        $rawDataDebe = @$_SESSION['arrayDebe'];
        $rawDataHaber = @$_SESSION['arrayHaber'];
        if (!empty($rawData)) 
        {
            $arrayComprobante=array();
            $arrayListaComprobantes=array();
            $referencia=$rawData[0]["numero_comprobante"];
            foreach ($rawData as $key => $value) 
            {
                if($rawData[$key]["numero_comprobante"]!=$referencia )
                {
                  $referencia=$rawData[$key]["numero_comprobante"];
                  $arrayListaComprobantes[]=$arrayComprobante;
                  $arrayComprobante=array();
                  
                }
                $arrayComprobante[]=$rawData[$key]["numero_comprobante"];
                $arrayComprobante[]=$rawData[$key]["dia"];
                $arrayComprobante[]=$rawData[$key]["mes"];
                $arrayComprobante[]=$rawData[$key]["Año"];
                $arrayComprobante[]=$rawData[$key]["razonsocial_empresa"];
                $arrayComprobante[]=$rawData[$key]["nombre_tipocomp"];
                $arrayComprobante[]=$rawData[$key]["cuenta"];
                $arrayComprobante[]=$rawData[$key]["descripcion_cuenta"];
                $arrayComprobante[]=$rawData[$key]["glosa_comprobante"];
                $arrayComprobante[]=$rawData[$key]["debe"];
                $arrayComprobante[]=$rawData[$key]["haber"];  
            }
            $arrayListaComprobantes[]=$arrayComprobante;
     
            for($i = 0;$i < count($arrayListaComprobantes);$i++) 
            {
               echo '<table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>Empresa:'.$arrayListaComprobantes[$i][4].'</th>
                        <th>Comprobante:'.$arrayListaComprobantes[$i][0].'</th>
                        <th>Fecha: '.$arrayListaComprobantes[$i][1].'-'.$arrayListaComprobantes[$i][2].'-'.$arrayListaComprobantes[$i][3].'</th>
                        <th>Tipo Comprobante:'.$arrayListaComprobantes[$i][5].'</th>
                      </tr>
                    </thead>
                    <thead>
                      <tr>
                        <th>Cuenta</th>
                        <th>Descripción</th>
                        <th>Glosa</th>
                        <th>Debe</th>
                        <th>Haber</th>
                      </tr>
                    </thead>
                    <tbody>';
                   for($j=6;$j<count($arrayListaComprobantes[$i]);$j++) 
                          {
                              echo '<tr>
                                      <td>'. $arrayListaComprobantes[$i][$j++].'</td>
                                      <td> '.$arrayListaComprobantes[$i][$j++].' </td>
                                      <td> '.$arrayListaComprobantes[$i][$j++].' </td>
                                      <td>'.number_format($arrayListaComprobantes[$i][$j++], 0, ",", ".").' </td>
                                      <td> '.number_format($arrayListaComprobantes[$i][$j], 0, ",", ".").' </td>
                                    </tr>';
                              $j+=6;
                          }

                  echo    '</tbody>';
                     echo '<tr>
                              <td class="text-center">TOTAL COMPROBANTE</td>
                              <td></td>
                              <td></td>
                              <td>'.number_format($rawDataDebe[$i], 0, ",", ".").'</td>
                              <td>'.number_format($rawDataHaber[$i], 0, ",", ".").'</td>
                            </tr>';
                  echo '</table>';                     
              
          }
      }
        else
          echo "No se encontraron datos con los valores indicados";
         @$_SESSION['data']='';
         @$_SESSION['arrayDebe']='';
         @$_SESSION['arrayHaber']='';
?>
</div>
</div>
<?php
/*
array (size=11)
  0 => 
    array (size=11)
      'razonsocial_empresa' => string 'Carlos Manuel Molina Gallardo' (length=29)
      'numero_comprobante' => string '1' (length=1)
      'dia' => string '5' (length=1)
      'mes' => string '12' (length=2)
      'Año' => string '2016' (length=4)
      'nombre_tipocomp' => string 'Egreso' (length=6)
      'cuenta' => string '10301002' (length=8)
      'descripcion_cuenta' => string 'Impuesto Renta' (length=14)
      'glosa_comprobante' => string 'Cancela Remun. por pagar y cotiz. previsionales' (length=47)
      'debe' => string '501268' (length=6)
      'haber' => string '0' (length=1)
  1 => 
    array (size=11)
      'razonsocial_empresa' => string 'Carlos Manuel Molina Gallardo' (length=29)
      'numero_comprobante' => string '1' (length=1)
      'dia' => string '5' (length=1)
      'mes' => string '12' (length=2)
      'Año' => string '2016' (length=4)
      'nombre_tipocomp' => string 'Egreso' (length=6)
      'cuenta' => string '10101001' (length=8)
      'descripcion_cuenta' => string 'Caja' (length=4)
      'glosa_comprobante' => string 'Cancela Remun. por pagar y cotiz. previsionales' (length=47)
      'debe' => string '83879' (length=5)
      'haber' => string '0' (length=1)
  2 => 
    array (size=11)
      'razonsocial_empresa' => string 'Carlos Manuel Molina Gallardo' (length=29)
      'numero_comprobante' => string '1' (length=1)
      'dia' => string '5' (length=1)
      'mes' => string '12' (length=2)
      'Año' => string '2016' (length=4)
      'nombre_tipocomp' => string 'Egreso' (length=6)
      'cuenta' => string '10201002' (length=8)
      'descripcion_cuenta' => string 'Instalaciones' (length=13)
      'glosa_comprobante' => string 'Cancela Remun. por pagar y cotiz. previsionales' (length=47)
      'debe' => string '44286' (length=5)
      'haber' => string '0' (length=1)
  3 => 
    array (size=11)
      'razonsocial_empresa' => string 'Carlos Manuel Molina Gallardo' (length=29)
      'numero_comprobante' => string '1' (length=1)
      'dia' => string '5' (length=1)
      'mes' => string '12' (length=2)
      'Año' => string '2016' (length=4)
      'nombre_tipocomp' => string 'Egreso' (length=6)
      'cuenta' => string '10201001' (length=8)
      'descripcion_cuenta' => string 'Muebles y Utiles' (length=16)
      'glosa_comprobante' => string 'Cancela Remun. por pagar y cotiz. previsionales' (length=47)
      'debe' => string '41200' (length=5)
      'haber' => string '0' (length=1)
  4 => 
    array (size=11)
      'razonsocial_empresa' => string 'Carlos Manuel Molina Gallardo' (length=29)
      'numero_comprobante' => string '1' (length=1)
      'dia' => string '5' (length=1)
      'mes' => string '12' (length=2)
      'Año' => string '2016' (length=4)
      'nombre_tipocomp' => string 'Egreso' (length=6)
      'cuenta' => string '20100001' (length=8)
      'descripcion_cuenta' => string 'I.V.A' (length=5)
      'glosa_comprobante' => string 'Cancela Remun. por pagar y cotiz. previsionales' (length=47)
      'debe' => string '22532' (length=5)
      'haber' => string '0' (length=1)
  5 => 
    array (size=11)
      'razonsocial_empresa' => string 'Carlos Manuel Molina Gallardo' (length=29)
      'numero_comprobante' => string '1' (length=1)
      'dia' => string '5' (length=1)
      'mes' => string '12' (length=2)
      'Año' => string '2016' (length=4)
      'nombre_tipocomp' => string 'Egreso' (length=6)
      'cuenta' => string '10301001' (length=8)
      'descripcion_cuenta' => string 'Cuenta Particular' (length=17)
      'glosa_comprobante' => string 'Cancela Remun. por pagar y cotiz. previsionales' (length=47)
      'debe' => string '19312' (length=5)
      'haber' => string '0' (length=1)
  6 => 
    array (size=11)
      'razonsocial_empresa' => string 'Carlos Manuel Molina Gallardo' (length=29)
      'numero_comprobante' => string '1' (length=1)
      'dia' => string '5' (length=1)
      'mes' => string '12' (length=2)
      'Año' => string '2016' (length=4)
      'nombre_tipocomp' => string 'Egreso' (length=6)
      'cuenta' => string '10101002' (length=8)
      'descripcion_cuenta' => string 'Mercaderias' (length=11)
      'glosa_comprobante' => string 'Cancela Remun. por pagar y cotiz. previsionales' (length=47)
      'debe' => string '0' (length=1)
      'haber' => string '712477' (length=6)
  7 => 
    array (size=11)
      'razonsocial_empresa' => string 'Carlos Manuel Molina Gallardo' (length=29)
      'numero_comprobante' => string '2' (length=1)
      'dia' => string '12' (length=2)
      'mes' => string '12' (length=2)
      'Año' => string '2016' (length=4)
      'nombre_tipocomp' => string 'Egreso' (length=6)
      'cuenta' => string '10101001' (length=8)
      'descripcion_cuenta' => string 'Caja' (length=4)
      'glosa_comprobante' => string 'Cancela Impuestos y honorarios' (length=30)
      'debe' => string '23428' (length=5)
      'haber' => string '0' (length=1)
  8 => 
    array (size=11)
      'razonsocial_empresa' => string 'Carlos Manuel Molina Gallardo' (length=29)
      'numero_comprobante' => string '2' (length=1)
      'dia' => string '12' (length=2)
      'mes' => string '12' (length=2)
      'Año' => string '2016' (length=4)
      'nombre_tipocomp' => string 'Egreso' (length=6)
      'cuenta' => string '10201001' (length=8)
      'descripcion_cuenta' => string 'Muebles y Utiles' (length=16)
      'glosa_comprobante' => string 'Cancela Impuestos y honorarios' (length=30)
      'debe' => string '0' (length=1)
      'haber' => string '23428' (length=5)
  9 => 
    array (size=11)
      'razonsocial_empresa' => string 'Carlos Manuel Molina Gallardo' (length=29)
      'numero_comprobante' => string '3' (length=1)
      'dia' => string '12' (length=2)
      'mes' => string '12' (length=2)
      'Año' => string '2016' (length=4)
      'nombre_tipocomp' => string 'Traspaso' (length=8)
      'cuenta' => string '10201002' (length=8)
      'descripcion_cuenta' => string 'Instalaciones' (length=13)
      'glosa_comprobante' => string 'Ajustes Credito Fiscal' (length=22)
      'debe' => string '188' (length=3)
      'haber' => string '0' (length=1)
  10 => 
    array (size=11)
      'razonsocial_empresa' => string 'Carlos Manuel Molina Gallardo' (length=29)
      'numero_comprobante' => string '3' (length=1)
      'dia' => string '12' (length=2)
      'mes' => string '12' (length=2)
      'Año' => string '2016' (length=4)
      'nombre_tipocomp' => string 'Traspaso' (length=8)
      'cuenta' => string '10101002' (length=8)
      'descripcion_cuenta' => string 'Mercaderias' (length=11)
      'glosa_comprobante' => string 'Ajustes Credito Fiscal' (length=22)
      'debe' => string '0' (length=1)
      'haber' => string '188' (length=3)
*/
?>  