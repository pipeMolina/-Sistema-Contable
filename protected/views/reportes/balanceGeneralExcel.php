<?php 
    $nombreArchivo = "Reportes-balanceGeneral";
    header("content-type: application/vnd.ms-excel");
    header("content-disposition: attachment; filename=".$nombreArchivo.".xls");
    header("cache-control: no-cache, must-revalidate");
    header("pragma: no-cache");
    header("expires: 0");
?>
<style>
  tr , th , td {
      border: 1px solid black;
      border-collapse: collapse;
  }
</style>
<?php @session_start();?>
<h2 align="center">Balance General:</h2>
<br></br>
<?php
        $rData=@$_SESSION['data'];
        $rawData = @$_SESSION['arrayCuentas'];
        $rawDataTAc = @$_SESSION['arrayTotalAcumulado'];
        $rawDataTG=@$_SESSION['arrayTotalGeneral'];
        $rawDataPE=@$_SESSION['perdidaEjercicio'];
        $rawDataSI=@$_SESSION['sumasIguales'];
        unset($_SESSION['data']);
        unset($_SESSION['arrayCuentas']);
        unset($_SESSION['arrayTotalAcumulado']);
        unset($_SESSION['arrayTotalGeneral']);
        unset($_SESSION['perdidaEjercicio']);
        unset($_SESSION['sumasIguales']);
        echo '<h3 align="center">Empresa:'.$rData[0]["razonsocial_empresa"].' &nbsp;&nbsp; Periodo:'.$rData[0]["Año"].'</h3>';

     if (!empty($rawData)) 
        {
          echo '<table class="table table-striped table-hover">
                  <thead>
                    <tr style="background-color: #FFFF00;">
                      <th>Cuenta</th>
                      <th></th>
                      <th>Debito</th>
                      <th>Credito</th>
                      <th>Deudor</th>
                      <th>Acreedor</th>
                      <th>Activos</th>
                      <th>Pasivos</th>
                      <th>Perdida</th>
                      <th>Ganancia</th>
                    </tr>
                  </thead>
                  <tbody>';
                  $codigoCuenta=0;
                    for($i=0;$i<count($rawData);$i++)
                    {
                      for($j=0;$j<count($rawData[$i]);$j++)
                      {
                        /*Se almacena el codigo cuenta para distinguir los tipos de cuentas */
                        $codigoCuenta=$rawData[$i][0];
                         echo '<tr>
                                      <td>'. $rawData[$i][$j++].'</td>
                                      <td> '.$rawData[$i][$j++].' </td>
                                      <td>'.number_format($rawData[$i][$j++], 0, ",", ".").' </td>
                                      <td>'.number_format($rawData[$i][$j++], 0, ",", ".").' </td>
                                      <td>'.number_format($rawData[$i][$j++], 0, ",", ".").' </td>
                                      <td>'.number_format($rawData[$i][$j++], 0, ",", ".").' </td>
                                      <td>'.number_format($rawData[$i][$j++], 0, ",", ".").' </td>
                                      <td>'.number_format($rawData[$i][$j++], 0, ",", ".").' </td>
                                      <td>'.number_format($rawData[$i][$j++], 0, ",", ".").' </td>
                                      <td> '.number_format($rawData[$i][$j++], 0, ",", ".").' </td>';
                                      
                           echo '</tr>';
                      }
                    } 
                    /*Total Acumulado*/
                    for($i=0;$i<count($rawDataTAc);$i++)
                    {
                      echo'<tr style="background-color: #FFFF00;">
                            <td>Total Acumulado</td>
                            <td></td>
                            <td>'.number_format($rawDataTAc[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataTAc[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataTAc[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataTAc[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataTAc[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataTAc[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataTAc[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataTAc[$i++], 0, ",", ".").' </td>
                          </tr>';
                    }
                    /*Total General*/
                    for($i=0;$i<count($rawDataTG);$i++)
                    {
                      echo'<tr style="background-color: #FFFF00;">
                            <td>Total General</td>
                            <td></td>
                            <td>'.number_format($rawDataTG[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataTG[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataTG[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataTG[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataTG[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataTG[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataTG[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataTG[$i++], 0, ",", ".").' </td>
                          </tr>';
                    }
                    /*Perdida de Ejercicio*/
                    for($i=0;$i<count($rawDataPE);$i++)
                    {
                      echo'<tr style="background-color: #FFFF00;">
                            <td>Perdida Ejercicio</td>
                            <td></td>
                            <td>'.number_format($rawDataPE[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataPE[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataPE[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataPE[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataPE[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataPE[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataPE[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataPE[$i++], 0, ",", ".").' </td>
                          </tr>';
                    }
                    /*Sumas Iguales*/
                    for($i=0;$i<count($rawDataSI);$i++)
                    {
                      echo'<tr style="background-color: #FFFF00;">
                            <td>Sumas Iguales</td>
                            <td></td>
                            <td>'.number_format($rawDataSI[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataSI[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataSI[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataSI[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataSI[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataSI[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataSI[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($rawDataSI[$i++], 0, ",", ".").' </td>
                          </tr>';
                    }
            echo '</tbody>';
          echo '</table>';    
        }
        else
          echo "No se encontraron datos con los valores indicados";
?>
</div>
</div>