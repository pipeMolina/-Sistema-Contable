<?php
    	$dataProvider=new CArrayDataProvider($data, array(
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
    ?>