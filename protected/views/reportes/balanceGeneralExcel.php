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
<h2 align= "center"><small><?php echo 'Empresa:'.@$_SESSION['filtro']['empresa'].' Periodo:'.@$_SESSION['filtro']['periodo'].''?></small></h2>
<br></br>
<?php
       $rawData = @$_SESSION['arrayCuentas'];
        
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
            echo '</tbody>';
          echo '</table>';    
        }
        else
          echo "No se encontraron datos con los valores indicados";
?>
</div>