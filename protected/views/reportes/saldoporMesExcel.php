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
<div id="print-total">
<h2 align="center">Saldo Por Mes:</h2>
<br></br>
  <?php 
    $rdata=@$_SESSION['data'];
    $rawData=@$_SESSION['arraySaldoMes'];
    echo '<h3><small>Empresa:'.$rdata[0]["razonsocial_empresa"].' &nbsp; Periodo:'.$rdata[0]["Año"].' &nbsp; Cuenta:'.$rdata[0]["descripcion_cuenta"].'</small></h3>';
    unset($_SESSION['arraySaldoMes']);
    unset($_SESSION['data']);
    @$_SESSION['filtro']['empresa']="";
    @$_SESSION['filtro']['cuenta']="";
    @$_SESSION['filtro']['periodo']="";
    if (!empty($rawData)) 
    {
           echo '<table class="table table-striped table-hover">
                    <thead>
                      <tr style="background-color: #FFFF00;"> 
                        <th>Mes</th>
                        <th>Débito</th>
                        <th>Crédito</th>
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
      @$_SESSION['filtro']['empresa']="";
      @$_SESSION['filtro']['cuenta']="";
      @$_SESSION['filtro']['periodo']="";
    }

  ?>
  
</div>