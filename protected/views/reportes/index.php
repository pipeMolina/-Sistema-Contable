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
                	', array('reportes/libroDiario'));
            echo '</div>';
            echo CHtml::link('
                    <img src="'.Yii::app()->baseUrl.'/images/icons/librodiario.png" alt="Libro Diario"  width="10%" />
                    <div"><h4>Libro Mayor</h4></div>
                    ', array('reportes/libroMayor'));
            echo '</div>';
            echo CHtml::link('
                    <img src="'.Yii::app()->baseUrl.'/images/icons/librodiario.png" alt="Libro Diario"  width="10%" />
                    <div"><h4>Saldo por Mes</h4></div>
                    ', array('reportes/saldoporMes'));
            echo '</div>';
            echo CHtml::link('
                    <img src="'.Yii::app()->baseUrl.'/images/icons/librodiario.png" alt="Libro Diario"  width="10%" />
                    <div"><h4>Balance Genenal</h4></div>
                    ', array('reportes/balanceGeneral'));
            echo '</div>';
            echo CHtml::link('
                    <img src="'.Yii::app()->baseUrl.'/images/icons/librodiario.png" alt="Libro Diario"  width="10%" />
                    <div"><h4>Estado Resultado</h4></div>
                    ', array('reportes/estadoResultado'));
            echo '</div>';
?>
</div>