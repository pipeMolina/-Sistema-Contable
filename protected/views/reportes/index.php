<?php
	$this->breadcrumbs=array(
		'Reportes',
	);
?>
<div class="container">
<?php
	
    	 echo '<div class="row">
        <h1>Reportes Contables</h1>
        <br>';
            echo CHtml::link('
                    <img src="'.Yii::app()->baseUrl.'/images/icons/librodiario.png" alt="Libro Diario"  width="10%" />
                    <div"><h4>Libro Diario</h4></div>
                	', array('reportes/librodiario'));
            echo '</div>';
?>
</div>