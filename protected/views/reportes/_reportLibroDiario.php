<?php
	$this->breadcrumbs=array(
		'Reportes'=>array('index'),
		'LibroDiario',
	);
?>

<div class="row-fluid">
    <div>
    	<table>
    		<tr>
	            <td align="center">
	                    <?php echo "Empresa";?>
	            </td>
	            <td align="center">
	                    <?php echo "Mes";?>
	            </td>
        	</tr>
        	<tr>
	            <td>
                      <?php  echo CHtml::dropDownList('filterE','RUT_EMPRESA',CHtml::listData(Empresa::model()->findAll(array('order'=>'RAZONSOCIAL_EMPRESA')),'RUT_EMPRESA','RAZONSOCIAL_EMPRESA'),array('class'=>'span12'));?>

	            </td>
	             <td valign="top" align="center">
	                    <?php /* Filtrado por Mes */ 
	                        //echo '<form action=<"'.CController::createUrl('reportes/filterMonth').'" id="formulario1" method="post" name="formulario1">';
	                        $meses = array(1=>'Enero',2=>'Febrero',3=>'Marzo',4=>'Abril',5=>'Mayo',6=>'Junio',7=>'Julio',8=>'Agosto',9=>'Septiembre',10=>'Octubre',11=>'Noviembre',12=>'Diciembre');
	                        echo CHtml::dropDownList('filterM',$meses,array('empty'=>"Seleccione Mes",$meses));
	                        //echo '</form>';
	                    ?>
	            </td>
	        </tr>
    	</table>
    </div>
</div>
<?php

	$dataProvider=new CArrayDataProvider($rawData, array(
    'id'=>'librodiario',
    'pagination'=>array(
        'pageSize'=>10,
    ),
));
	?>
	
	<?php
	@$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'librodiario-grid',
    'dataProvider'=>$dataProvider,
    'columns'=>array(
    					array(
                            'name'=>'glosa_comprobante',
                            'header'=>'Glosa Comprobante',
                        ),
                        array(
                            'name'=>'cuenta',
                        ),
                        array(
                            'name'=>'debe',
                            'value' =>'number_format($data[debe], 0, ",", ".");',
                        ),
                        array(
                            'name'=>'haber',
                            'value' =>'number_format($data[haber], 0, ",", ".");',
                        ),
                        


    	),
 ));
?>

	