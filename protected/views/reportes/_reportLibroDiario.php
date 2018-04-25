<script type="text/javascript">
    function Asignate(obj){
        var choose = obj.value;
        if(obj.id == 'filterD'){
            document.getElementById('hiddenD').value = choose;
        }
        if(obj.id == 'filterM'){
            document.getElementById('hiddenM').value = choose;
        }
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
        unset($_SESSION['data']);
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
         @$_SESSION['filtro']['periodo'] = '';
         @$_SESSION['filtro']['dia'] = '';
         @$_SESSION['filtro']['mes'] = '';
         @$_SESSION['filtro']['empresa'] = '';
?>
</div>
</div>
