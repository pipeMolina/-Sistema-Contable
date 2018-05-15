<?php 
    $nombreArchivo = "Reportes-LibroMayor";
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

<h2 align="center">Libro Mayor:</h2>
<br></br>
<div id="print-total">
  <?php 

    $rawData=@$_SESSION['data'];
    $rawDataDebe=@$_SESSION['arrayDebe'];
    $rawDataHaber=@$_SESSION['arrayHaber'];
    $rawDataSaldos=@$_SESSION['arraySaldos'];
    $rawDataArrayListaSaldos=@$_SESSION['arrayListaSaldos'];
    $acumuladoDebe=@$_SESSION['arrayTotalAcDebe'];
    $acumuladoHaber=@$_SESSION['arrayTotalAcHaber'];
    $acumuladoSaldos=@$_SESSION['arrayTotalAcSaldo'];
    
    $saldoAnteriorD=@$_SESSION['saldoAnteriorD'];
    $saldoAnteriorH=@$_SESSION['saldoAnteriorH'];
    $saldoAnteriorS=@$_SESSION['saldoAnteriorS'];

    @$_SESSION['filtro']['empresa']="";
    @$_SESSION['filtro']['periodo']="";
    @$_SESSION['filtro']['cuenta']="";

    unset($_SESSION['data']);
    unset($_SESSION['arrayDebe']);
    unset($_SESSION['arrayHaber']);
    unset($_SESSION['arraySaldos']);
    unset($_SESSION['arrayListaSaldos']);
    unset($_SESSION['arrayTotalAcDebe']);
    unset($_SESSION['arrayTotalAcHaber']);
    unset($_SESSION['arrayTotalAcSaldo']);
    unset($_SESSION['saldoAnteriorD']);
    unset($_SESSION['saldoAnteriorH']);
    unset($_SESSION['saldoAnteriorS']);
    echo '<h3 align="center">Empresa:'.$rawData[0]["razonsocial_empresa"].' &nbsp;&nbsp; Periodo:'.$rawData[0]["Año"].'</h3>';
    if (!empty($rawData)) 
    {
      $arrayComprobante=array();
      $arrayListaComprobantes=array();
      $referencia=$rawData[0]["mes"];
      $fila=0;
      $columna=0;
      $i=0;
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
        $arrayComprobante[]=$rawData[$key]["dia"];
        $arrayComprobante[]=$rawData[$key]["mes"];
        $arrayComprobante[]=$rawData[$key]["Año"];
        $arrayComprobante[]=$rawData[$key]["numero_comprobante"];
        $arrayComprobante[]=$rawData[$key]["nombre_tipocomp"];
        $arrayComprobante[]=$rawData[$key]["glosa_comprobante"];
        $arrayComprobante[]=$rawData[$key]["debe"];
        $arrayComprobante[]=$rawData[$key]["haber"];
        $arrayComprobante[]=$rawDataSaldos[$i];
        $arrayComprobante[]=$rawDataArrayListaSaldos[$fila][$columna];
        $columna++;
        $i++;
      }
      $arrayListaComprobantes[]=$arrayComprobante;
    
      for($i=0;$i<count($arrayListaComprobantes);$i++)
      {

           echo '<table class="table table-striped table-hover">
                    <thead>
                      <tr style="background-color: #FFFF00;">
                        <th>Cuenta:'.$arrayListaComprobantes[$i][1].'&nbsp;&nbsp;&nbsp;'.$arrayListaComprobantes[$i][2].' </th>
                      </tr>
                    </thead>
                    <thead>
                      <tr style="background-color: #FFFF00;">
                        <th>Mes:'.$arrayListaComprobantes[$i][4].'</th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Saldo Anterior</th>
                        <th>'.number_format($saldoAnteriorD[$i], 0, ",", ".").'</th>
                        <th>'.number_format($saldoAnteriorH[$i], 0, ",", ".").'</th>
                        <th>'.number_format($saldoAnteriorS[$i], 0, ",", ".").'</th>
                      </tr>
                    </thead>
                    <thead>
                      <tr style="background-color: #FFFF00;">
                        <th>Dia</th>
                        <th>Mes</th>
                        <th>Periodo</th>
                        <th>Numero</th>
                        <th>Tipo</th>
                        <th>Documento Glosa</th>
                        <th>Debito</th>
                        <th>Credito</th>
                        <th>Saldo</th>
                      </tr>
                    </thead>
                        <tbody>';
                          for($j=3;$j<count($arrayListaComprobantes[$i]);$j++) 
                          {
                              echo '<tr>
                                      <td>'. $arrayListaComprobantes[$i][$j++].'</td>
                                      <td>'. $arrayListaComprobantes[$i][$j++].'</td>
                                      <td>'. $arrayListaComprobantes[$i][$j++].'</td>
                                      <td>'. $arrayListaComprobantes[$i][$j++].'</td>
                                      <td>'. $arrayListaComprobantes[$i][$j++].'</td>
                                      <td>'. $arrayListaComprobantes[$i][$j++].'</td>
                                      <td>'.number_format($arrayListaComprobantes[$i][$j++], 0, ",", ".").' </td>
                                      <td> '.number_format($arrayListaComprobantes[$i][$j++], 0, ",", ".").' </td>
                                      <td> '.number_format($arrayListaComprobantes[$i][$j++], 0, ",", ".").' </td>';
                                    echo  '</tr>';
                                      $j+=3;
                          }

                    echo  '</tbody>';
                     echo '<tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td class="text-center">Total Mes de '.$arrayListaComprobantes[$i][4].'</td>
                              <td>'.number_format($rawDataDebe[$i], 0, ",", ".").'</td>
                              <td>'.number_format($rawDataHaber[$i], 0, ",", ".").'</td>
                              <td>'.number_format($rawDataArrayListaSaldos[$i], 0, ",", ".").'</td>
                            </tr>

                            <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td class="text-center">Total Acumulado </td>
                              <td>'.number_format($acumuladoDebe[$i], 0, ",", ".").'</td>
                              <td>'.number_format($acumuladoHaber[$i], 0, ",", ".").'</td>
                              <td>'.number_format($acumuladoSaldos[$i], 0, ",", ".").'</td>
                            </tr>
                 </table>';        
      }
    }
    else
    {
      echo "No se encontraron datos con los valores indicados";
      @$_SESSION['filtro']['empresa']="";
      @$_SESSION['filtro']['periodo']="";
      @$_SESSION['filtro']['cuenta']="";
        }

  ?>
  
</div>