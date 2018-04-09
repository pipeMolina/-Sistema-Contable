<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>
<div class="jumbotron">
	<div class="row">
		<div class="col-lg-6" align="center">
			<?php
				echo CHtml::link('
					<img src="'.Yii::app()->baseUrl.'/images/icons/comprobante-contable.jpg" class="img-thumbnail" alt="Libro Diario" width="40%" />
					<h4>Crear comprobante contable<h4>',array('comprobanteContable/create'));
			?>
		</div>
		<div class="col-lg-6" align="center">
			<?php
				echo CHtml::link('
					<img src="'.Yii::app()->baseUrl.'/images/icons/Libros-Contables.jpg" class="img-thumbnail" alt="Reportes" width="40%"/>
					<h4>Ver libros contables<h4>',array('reportes/index'));
			?>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-lg-6" align="center">
			<?php
				echo CHtml::link('
					<img src="'.Yii::app()->baseUrl.'/images/icons/plan-cuenta.jpg" class="img-thumbnail" alt="Plan Cuentas"  width="40%"/>
					<h4> Crear plan de cuentas<h4>',array('planCuenta/create'));
			?>
		</div>
		<div class="col-lg-6" align="center">
			<?php
				echo CHtml::link('
					<img src="'.Yii::app()->baseUrl.'/images/icons/cuenta.jpg" class="img-thumbnail" alt="Cuenta"  width="45%"/>
					<h4>Crear Cuenta<h4>',array('cuenta/create'));
			?>
		</div>
	</div>
</div>

