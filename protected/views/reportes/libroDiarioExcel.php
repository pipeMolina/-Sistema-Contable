<?php
    
    $nombreArchivo = "holaExcel";
    header("content-type: application/vnd.ms-excel");
    header("content-disposition: attachment; filename=".$nombreArchivo.".xls");
    header("cache-control: no-cache, must-revalidate");
    header("pragma: no-cache");
    header("expires: 0");
?>
<table>
  <tr>
    <td>mensaje</td>
  </tr>
</table>