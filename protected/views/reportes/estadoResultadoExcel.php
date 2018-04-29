<?php 
    $nombreArchivo = "Reportes-EstadoResultado";
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
<h2 align="center">Estado Resultado de Perdida y/o Ganancia:</h2>

<br></br>
<?php
       $rawData = @$_SESSION['arrayCuentas'];
       $rawDataTAc = @$_SESSION['arrayTotalAcumulado']; 
       $rawDataTG = @$_SESSION['arrayTotalGeneral'];
       $perdidaEjercicio = @$_SESSION['perdidaEjercicio'];
       $rawDataSI=@$_SESSION['sumasIguales'];
        
     if (!empty($rawData)) 
        {
          echo '<table class="table table-striped table-hover">
                  <thead>
                    <tr style="background-color: #FFFF00;">
                      <th>Cuenta</th>
                      <th></th>
                      <th>Debito</th>
                      <th>Credito</th>
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
                                      <td>'.number_format($rawData[$i][$j++], 0, ",", ".").' </td>';
                                      
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
                          </tr>';
                    }
                    /*Perdida del ejercicio*/
                    for($i=0;$i<count($rawDataTAc);$i++)
                    {
                      echo'<tr style="background-color: #FFFF00;">
                            <td>Perdida Ejercicio</td>
                            <td></td>
                            <td>'.number_format($perdidaEjercicio[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($perdidaEjercicio[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($perdidaEjercicio[$i++], 0, ",", ".").' </td>
                            <td>'.number_format($perdidaEjercicio[$i++], 0, ",", ".").' </td>
                          </tr>';
                    }
                    /*Sumas Iguales*/
                    for($i=0;$i<count($rawDataTAc);$i++)
                    {
                      echo'<tr style="background-color: #FFFF00;">
                            <td>Sumas Iguales</td>
                            <td></td>
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
?>traron datos con los valores indicados";
?>