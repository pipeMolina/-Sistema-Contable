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
                    
                         echo '<form action=<"'.CController::createUrl('reportes/filterExcelLibroDiario').'" id="formulario5" method="post" name="formulario5">';
                         echo '<input id="hiddenD" type="hidden" name="hiddenD" value="'.@$_SESSION['filtro']['dia'].'">';   
                         echo '<input id="hiddenM" type="hidden" name="hiddenM" value="'.@$_SESSION['filtro']['mes'].'">';
                         echo '<input id="hiddenP" type="hidden" name="hiddenP" value="'.@$_SESSION['filtro']['periodo'].'">';   
                         echo '<input id="hiddenE" type="hidden" name="hiddenE" value="'.@$_SESSION['filtro']['empresa'].'">'; 
                        echo CHtml::ajaxSubmitButton('Exportar a Excel',CHtml::normalizeUrl(array('reportes/filterExcelLibroDiario')),
                            array(
                                'type'=>'POST',
                                'update' => '#print-total',
                            ),
                            array('type'=>'submit', 'class'=>'btn btn-primary' )
                        );
                        echo '</form>';
                    
                    ?>        
                </td>
	        </tr>
    	</table>
    </div>
</br>
<div id="print-total">
<h3 align="center" style="blue">Libro Diario </h3><br>
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
                $arrayComprobante[]=$rawData[$key]["cuenta"];
                $arrayComprobante[]=$rawData[$key]["descripcion_cuenta"];
                $arrayComprobante[]=$rawData[$key]["glosa_comprobante"];
                $arrayComprobante[]=$rawData[$key]["debe"];
                $arrayComprobante[]=$rawData[$key]["haber"];  
            }
            $arrayListaComprobantes[]=$arrayComprobante;
           
            for($i = 0;$i < count($arrayListaComprobantes);$i++) 
            {
?>
                  <table class="table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>N° Comrpobante:<?php echo ' '.$arrayListaComprobantes[$i][0] ?></th>
                        <th>Empresa:<?php echo ' '.$rawData[$key]['razonsocial_empresa'] ?></th>
                        <th>Tipo Comprobante:<?php echo ' '.$rawData[$key]['nombre_tipocomp'] ?></th>
                      </tr>
                    </thead>
                    <thead>
                      <tr>
                        <th>Cuenta</th>
                        <th>Descripcion</th>
                        <th>Glosa</th>
                        <th>Debe</th>
                        <th>Haber</th>
                      </tr>
                    </thead>
                    <tbody>
<?php                   for($j=0;$j<count($arrayListaComprobantes[$i]);$j++) 
                          {
?>
                              <tr>
                                <td><?php echo $arrayListaComprobantes[$i][$j++] ?></td>
                                <td><?php echo $arrayListaComprobantes[$i][$j++] ?></td>
                                <td><?php echo $arrayListaComprobantes[$i][$j++] ?></td>
                                <td><?php echo $arrayListaComprobantes[$i][$j++] ?></td>
                                <td><?php echo $arrayListaComprobantes[$i][$j] ?></td>
                              </tr>
<?php 
        
                          }
?>

                    </tbody>
                  </table> 
<?php 
          }
      }
        else
          echo "No se han encontrado datos para el filtro seleccionado";
         @$_SESSION['data']='';
         @$_SESSION['arrayDebe']='';
         @$_SESSION['arrayHaber']='';
?>
</div>
</div>
<?php
/*

  array (size=9)
  0 => 
    array (size=10)
      'rut_empresa' => string '12488706-2' (length=10)
      'numero_comprobante' => string '1' (length=1)
      'dia' => string '5' (length=1)
      'mes' => string '12' (length=2)
      'AÃ±o' => string '2016' (length=4)
      'id_tipocomp' => string '2' (length=1)
      'cuenta' => string '20109001' (length=8)
      'glosa_comprobante' => string 'Cancela Remun. por pagar y cotiz. previsionales' (length=47)
      'debe' => string '83879' (length=5)
      'haber' => null
  1 => 
    array (size=10)
      'rut_empresa' => string '12488706-2' (length=10)
      'numero_comprobante' => string '1' (length=1)
      'dia' => string '5' (length=1)
      'mes' => string '12' (length=2)
      'AÃ±o' => string '2016' (length=4)
      'id_tipocomp' => string '2' (length=1)
      'cuenta' => string '20100001' (length=8)
      'glosa_comprobante' => string 'Cancela Remun. por pagar y cotiz. previsionales' (length=47)
      'debe' => string '41200' (length=5)
      'haber' => null
  2 => 
    array (size=10)
      'rut_empresa' => string '12488706-2' (length=10)
      'numero_comprobante' => string '1' (length=1)
      'dia' => string '5' (length=1)
      'mes' => string '12' (length=2)
      'AÃ±o' => string '2016' (length=4)
      'id_tipocomp' => string '2' (length=1)
      'cuenta' => string '20122000' (length=8)
      'glosa_comprobante' => string 'Cancela Remun. por pagar y cotiz. previsionales' (length=47)
      'debe' => string '19312' (length=5)
      'haber' => null
  3 => 
    array (size=10)
      'rut_empresa' => string '12488706-2' (length=10)
      'numero_comprobante' => string '1' (length=1)
      'dia' => string '5' (length=1)
      'mes' => string '12' (length=2)
      'AÃ±o' => string '2016' (length=4)
      'id_tipocomp' => string '2' (length=1)
      'cuenta' => string '20126000' (length=8)
      'glosa_comprobante' => string 'Cancela Remun. por pagar y cotiz. previsionales' (length=47)
      'debe' => string '22532' (length=5)
      'haber' => null
  4 => 
    array (size=10)
      'rut_empresa' => string '12488706-2' (length=10)
      'numero_comprobante' => string '1' (length=1)
      'dia' => string '5' (length=1)
      'mes' => string '12' (length=2)
      'AÃ±o' => string '2016' (length=4)
      'id_tipocomp' => string '2' (length=1)
      'cuenta' => string '20127000' (length=8)
      'glosa_comprobante' => string 'Cancela Remun. por pagar y cotiz. previsionales' (length=47)
      'debe' => string '44286' (length=5)
      'haber' => null
  5 => 
    array (size=10)
      'rut_empresa' => string '12488706-2' (length=10)
      'numero_comprobante' => string '1' (length=1)
      'dia' => string '5' (length=1)
      'mes' => string '12' (length=2)
      'AÃ±o' => string '2016' (length=4)
      'id_tipocomp' => string '2' (length=1)
      'cuenta' => string '20132000' (length=8)
      'glosa_comprobante' => string 'Cancela Remun. por pagar y cotiz. previsionales' (length=47)
      'debe' => string '501268' (length=6)
      'haber' => null
  6 => 
    array (size=10)
      'rut_empresa' => string '12488706-2' (length=10)
      'numero_comprobante' => string '1' (length=1)
      'dia' => string '5' (length=1)
      'mes' => string '12' (length=2)
      'AÃ±o' => string '2016' (length=4)
      'id_tipocomp' => string '2' (length=1)
      'cuenta' => string '10101000' (length=8)
      'glosa_comprobante' => string 'Cancela Remun. por pagar y cotiz. previsionales' (length=47)
      'debe' => null
      'haber' => string '712477' (length=6)
  7 => 
    array (size=10)
      'rut_empresa' => string '12488706-2' (length=10)
      'numero_comprobante' => string '2' (length=1)
      'dia' => string '12' (length=2)
      'mes' => string '12' (length=2)
      'AÃ±o' => string '2016' (length=4)
      'id_tipocomp' => string '2' (length=1)
      'cuenta' => string '10103000' (length=8)
      'glosa_comprobante' => string 'Cancela Impuestos y honorarios' (length=30)
      'debe' => string '23428' (length=5)
      'haber' => null
  8 => 
    array (size=10)
      'rut_empresa' => string '12488706-2' (length=10)
      'numero_comprobante' => string '2' (length=1)
      'dia' => string '12' (length=2)
      'mes' => string '12' (length=2)
      'AÃ±o' => string '2016' (length=4)
      'id_tipocomp' => string '2' (length=1)
      'cuenta' => string '10101000' (length=8)
      'glosa_comprobante' => string 'Cancela Impuestos y honorarios' (length=30)
      'debe' => null
      'haber' => string '23428' (length=5)

*/

/*

array (size=2)
  0 => 
    array (size=28)
      0 => string '20109001' (length=8)
      1 => string 'Cancela Remun. por pagar y cotiz. previsionales' (length=47)
      2 => string '83879' (length=5)
      3 => null
      4 => string '20100001' (length=8)
      5 => string 'Cancela Remun. por pagar y cotiz. previsionales' (length=47)
      6 => string '41200' (length=5)
      7 => null
      8 => string '20122000' (length=8)
      9 => string 'Cancela Remun. por pagar y cotiz. previsionales' (length=47)
      10 => string '19312' (length=5)
      11 => null
      12 => string '20126000' (length=8)
      13 => string 'Cancela Remun. por pagar y cotiz. previsionales' (length=47)
      14 => string '22532' (length=5)
      15 => null
      16 => string '20127000' (length=8)
      17 => string 'Cancela Remun. por pagar y cotiz. previsionales' (length=47)
      18 => string '44286' (length=5)
      19 => null
      20 => string '20132000' (length=8)
      21 => string 'Cancela Remun. por pagar y cotiz. previsionales' (length=47)
      22 => string '501268' (length=6)
      23 => null
      24 => string '10101000' (length=8)
      25 => string 'Cancela Remun. por pagar y cotiz. previsionales' (length=47)
      26 => null
      27 => string '712477' (length=6)
  1 => 
    array (size=4)
      0 => string '10103000' (length=8)
      1 => string 'Cancela Impuestos y honorarios' (length=30)
      2 => string '23428' (length=5)
      3 => null
*/
?>  