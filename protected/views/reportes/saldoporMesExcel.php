<?php 
    $nombreArchivo = "Reportes-LibroSaldoporMes";
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
<h2 align="center">Saldo Por Mes:</h2>
<h2 align= "center"><small><?php echo 'Año:'.@$_SESSION['filtro']['periodo'].' Cuenta:'.@$_SESSION['filtro']['cuenta'].''?></small></h2>
<br></br>
  <?php 
   
    $rawData=@$_SESSION['arraySaldoMes'];

    if (!empty($rawData)) 
    {
           echo '<table class="table table-striped table-hover">
                    <thead>
                      <tr style="background-color: #FFFF00;"> 
                        <th>Mes</th>
                        <th>Debito</th>
                        <th>Credito</th>
                        <th>Saldo del Mes</th>
                        <th>Total Acumulado</th>
                      </tr>
                    </thead>
                  <tbody>';
      for($i=1;$i<count($rawData);$i++)
      {
        for($j=0;$j<count($rawData[$i]);$j++)
        {
          echo '<tr>';
              echo   '<td>'. $rawData[$i][$j++].'</td>
                      <td>'.number_format($rawData[$i][$j++], 0, ",", ".").' </td>
                       <td> '.number_format($rawData[$i][$j++], 0, ",", ".").' </td>
                       <td> '.number_format($rawData[$i][$j++], 0, ",", ".").' </td>
                       <td> '.number_format($rawData[$i][$j], 0, ",", ".").' </td>';
          echo '</tr>';
          }   
      }
            echo    '</tbody>';
            echo '</table>'; 
    }
    else
    {
      echo "No se encontraron datos con los valores indicados";
    }

  ?>
  
</div>