<?php 
    $nombreArchivo = "Reportes-LibroDiario";
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

<h2 align="center">Libro Diario:</h2>

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
                      <tr style="background-color: #FFFF00;">
                        <th>Comprobante:'.$arrayListaComprobantes[$i][0].'</th>
                        <th>Fecha: '.$arrayListaComprobantes[$i][1].'-'.$arrayListaComprobantes[$i][2].'-'.$arrayListaComprobantes[$i][3].'</th>
                        <th>Empresa:'.$arrayListaComprobantes[$i][4].'</th>
                        <th>Tipo Comprobante:'.$arrayListaComprobantes[$i][5].'</th>
                      </tr>
                    </thead>
                    <thead>
                      <tr style="background-color: #FFFF00;">
                        <th>Cuenta</th>
                        <th>Descripcion</th>
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
                                       <td>'. number_format($arrayListaComprobantes[$i][$j++], 0, ",", ".").' </td>
                                      <td> '.number_format($arrayListaComprobantes[$i][$j], 0, ",", ".").' </td>
                                    </tr>';
                              $j+=6;
                          }
                   echo    '</tbody>';
                   echo '<tr style="background-color: #FFFF00;">
                              <td class="text-center">TOTAL</td>
                              <td></td>
                              <td></td>
                              <td>'.number_format($rawDataDebe[$i], 0, ",", ".").'</td>
                              <td>'.number_format($rawDataHaber[$i], 0, ",", ".").'</td>
                            </tr>';
                  echo '</table>';
                  echo '<br></br>';
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