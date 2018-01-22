<script type="text/javascript">
    function Asignate(target){
        var choose = target.value;
        if(target.id == 'filterD'){
            document.getElementById('hiddenD').value = choose;
        }
        if(target.id == 'filterM'){
            document.getElementById('hiddenM').value = choose;
        }
        if(target.id == 'filterA'){
            document.getElementById('hiddenA').value = choose;
        }
        if(target.id == 'filterE'){
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

<div class="row-fluid">
    <div>
    	<table>
    		<tr>
                 <td align="center">
                        <?php echo "Empresa";?>
                </td>
                 <td align="center">
                        <?php echo "Día";?>
                </td>
	            <td align="center">
	                    <?php echo "Mes";?>
	            </td>
	            <td align="center">
	                    <?php echo "Año";?>
	            </td>
        	</tr>
        	<tr>
	            <td>
                      <?php  echo CHtml::dropDownList('filterE',@$_POST['empresa'],CHtml::listData(Empresa::model()->findAll(array('order'=>'RAZONSOCIAL_EMPRESA')),'RUT_EMPRESA','RAZONSOCIAL_EMPRESA'),array(
                              'empty'=>'Seleccione Empresa',
                              'onchange' => 'Asignate(this)',
                              'class'=>'form-control'
                              ));
                      ?>

	            </td>
                 <td valign="top" align="center">
                <?php /* Filtrado por Día */ 
                        echo '<form action=<"'.CController::createUrl('reportes/filterDay').'" id="formulario" method="post" name="formulario">';
                        $dias;
                        $count = 1;
                        for($i=1;$i<=31;$i++)
                        {
                            $dias[$i] = $count;
                            $count++;
                        } 
                        echo CHtml::dropDownList('filterD',@$_POST['dia'],$dias,array(
                            'empty'=> 'Todos',
                            'onchange' => 'Asignate(this)',
                            'class'=>'form-control'
                        ));
                        echo '</form>';
                    ?>
                </td>
	             <td valign="top" align="center">
	                    <?php /* Filtrado por Mes */ 
	                        echo '<form action=<"'.CController::createUrl('reportes/filterMonth').'" id="formulario1" method="post" name="formulario1">';
	                        $meses = array(1=>'Enero',2=>'Febrero',3=>'Marzo',4=>'Abril',5=>'Mayo',6=>'Junio',7=>'Julio',8=>'Agosto',9=>'Septiembre',10=>'Octubre',11=>'Noviembre',12=>'Diciembre');
	                        echo CHtml::dropDownList('filterM',@$_POST['mes'],$meses,array(
                                'empty'=>"Seleccione Mes",
                                'onchange' => 'Asignate(this)',
                                'class'=>'form-control'
                                ));
	                        echo '</form>';
	                    ?>
	            </td>
                <td valign="top" align="center">
                    <?php /* Filtrado por Año */
                        echo '<form action=<"'.CController::createUrl('reportes/filterYear').'" id="formulario2" method="post" name="formulario2">';
                        $years = array();
                        for($i = date("Y") ; $i>=date("Y")-5; $i--)
                        {
                            $years[$i] = $i;
                        }
                        echo CHtml::dropDownList('filterA',@$_POST['periodo'],$years,array('empty'=>'Seleccione Año','class'=>'form-control','onchange' => 'Asignate(this)'));  
                        echo '</form>';
                    ?>        
                </td>
                <td valign="top" align="center">
                    <?php
                    
                         echo '<form action=<"'.CController::createUrl('reportes/librodiario').'" id="formulario" method="post" name="formulario">';
                         echo '<input id="hiddenD" type="hidden" name="hiddenD" value="'.@$_POST['dia'].'">';   
                         echo '<input id="hiddenM" type="hidden" name="hiddenM" value="'.@$_POST['mes'].'">';
                         echo '<input id="hiddenA" type="hidden" name="hiddenA" value="'.@$_POST['periodo'].'">';   
                         echo '<input id="hiddenE" type="hidden" name="hiddenE" value="'.@$_POST['empresa'].'">'; 
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
	        </tr>
    	</table>
    </div>
</div>
<div id="print-total">
</div>
<!--<?php/*

	$dataProvider=new CArrayDataProvider($rawData, array(
    'id'=>'librodiario',
    'pagination'=>array(
        'pageSize'=>10,
    ),
));
	*/?>-->
	
	<!--<?php/*
	@$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'librodiario-grid',
    'dataProvider'=>$dataProvider,
    'columns'=>array(
                        array(
                            'name'=>'numero_comprobante',
                            'header'=>'Numero Comprobante',
                        ),
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
*/?>-->


	