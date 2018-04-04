<script type="text/javascript">
    function Asignate(target){
        var choose = target.value;
        if(target.id == 'filterC'){
            document.getElementById('hiddenC').value = choose;
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
    'LibroSaldoporMes',
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
                        <?php echo "Cuenta";?>
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
                <td valign="top" align="center" class="col-lg-4">
                  <?php /* Filtrado por Cuenta */ 
                          echo '<form action=<"'.CController::createUrl('reportes/filterCuenta').'" id="formulario3" method="post" name="formulario3">';
                          echo CHtml::dropDownList('filterC',@$_SESSION['filtro']['cuenta'],array(),array(
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
                    
                         echo '<form action=<"'.CController::createUrl('reportes/filterLibroMayor').'" id="formulario" method="post" name="formulario">';
                         echo '<input id="hiddenC" type="hidden" name="hiddenC" value="'.@$_SESSION['filtro']['cuenta'].'">';   
                         echo '<input id="hiddenP" type="hidden" name="hiddenP" value="'.@$_SESSION['filtro']['periodo'].'">';   
                         echo '<input id="hiddenE" type="hidden" name="hiddenE" value="'.@$_SESSION['filtro']['empresa'].'">'; 
                         echo CHtml::ajaxSubmitButton('Buscar',CHtml::normalizeUrl(array('reportes/filterSaldoporMes')),
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
                    
                         echo '<form action=<"'.CController::createUrl('reportes/filterExcelLibroMayor').'" id="formulario5" method="post" name="formulario5">';
                         echo '<input id="hiddenC" type="hidden" name="hiddenC" value="'.@$_SESSION['filtro']['cuenta'].'">';   
                         echo '<input id="hiddenP" type="hidden" name="hiddenP" value="'.@$_SESSION['filtro']['periodo'].'">';   
                         echo '<input id="hiddenE" type="hidden" name="hiddenE" value="'.@$_SESSION['filtro']['empresa'].'">'; 
                         echo CHtml::ajaxSubmitButton('Exportar a Excel',CHtml::normalizeUrl(array('reportes/filterExcelLibroMayor')),
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

<div id="print-total">
<h2 align="center">Saldo Por Mes:</h2>
<h2 align= "center"><small><?php echo 'Año:'.@$_SESSION['filtro']['periodo'].' Cuenta:'.@$_SESSION['filtro']['cuenta'].''?></small></h2>
<br></br>
  <?php 
    $rawData=@$_SESSION['data'];
    $rawDataArrayListaSaldos=@$_SESSION['arrayListaSaldos'];
    $rawDataDebe=@$_SESSION['arrayDebe'];
    $rawDataHaber=@$_SESSION['arrayHaber'];
    $rawDataTotalSaldos=@$_SESSION['arrayTotalSaldos'];
    var_dump($rawDataTotalSaldos);
    if (!empty($rawData)) 
    {
      $arrayComprobante=array();
      $arrayListaComprobantes=array();
      $referencia=$rawData[0]["mes"];
      $fila=0;
      $columna=0;
      foreach ($rawData as $key => $value) 
      {
        if($rawData[$key]["mes"]!=$referencia )
        {
          $referencia=$rawData[$key]["mes"];
          $arrayListaComprobantes[]=$arrayComprobante;
          $arrayComprobante=array();
          $fila++;
          $columna=0;      
       
        }
        $arrayComprobante[]=$rawData[$key]["razonsocial_empresa"];
        $arrayComprobante[]=$rawData[$key]["cuenta"];
        $arrayComprobante[]=$rawData[$key]["descripcion_cuenta"];
        $arrayComprobante[]=$rawData[$key]["mes"];
        $arrayComprobante[]=$rawData[$key]["debe"];
        $arrayComprobante[]=$rawData[$key]["haber"];
        $arrayComprobante[]=$rawDataArrayListaSaldos[$fila][$columna];
        $columna++;
      }
      $arrayListaComprobantes[]=$arrayComprobante;
      for($i=0;$i<count($arrayListaComprobantes);$i++)
      {

           echo '<table class="table table-striped table-hover">
                    <thead>
                      <tr> 
                        <th>Mes</th>
                        <th>Debito</th>
                        <th>Credito</th>
                        <th>Saldo del Mes</th>
                        <th>Total Acumulado</th>
                      </tr>
                    </thead>
                    <td></td>
                       <td>'.number_format($rawDataDebe[$i], 0, ",", ".").'</td>
                              <td>'.number_format($rawDataHaber[$i], 0, ",", ".").'</td>
          
                 </table>';    
      }
    }
    else
    {
      echo "No se encontraron datos con los valores indicados";
      $_SESSION['arrayListaSaldos']='';
    }

  ?>
  
</div>
<script language="javascript">
$(document).ready(function(){
   $("#filterE").change(function () {
            elegido=$(this).val();
            
            var url = "<?php echo CController::createUrl('reportes/cargaCuentas'); ?>";
            $.ajax(
                {
                  type:"POST",
                  url: url,
                  data: "rut="+elegido,
                  dataType:"html",
                  success: function(data)
                  {
                    $("#filterC").html(data);
                  }
                });           
   })
});
</script>