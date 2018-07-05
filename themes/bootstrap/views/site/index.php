<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<div class="jumbotron">
	<div class="row">
		<div class="col-lg-6" align="center">
			<?php
				echo CHtml::link('
					<img src="'.Yii::app()->baseUrl.'/images/icons/comprobante-contable.jpg" onmouseover="this.width=215;this.height=100;" onmouseout="this.width=200;this.height=150;" width="200" height="150" class="img-thumbnail box-shadow"/>
					<h4>Crear comprobante contable<h4>',array('comprobanteContable/create'));
			?>
		</div>
		<div class="col-lg-6" align="center">
			<?php
				echo CHtml::link('
					<img src="'.Yii::app()->baseUrl.'/images/icons/Libros-Contables.jpg" onmouseover="this.width=210;this.height=100;" onmouseout="this.width=190;this.height=200;" width="190" height="200" class="img-thumbnail box-shadow"/>
					<h4>Ver libros contables<h4>',array('reportes/index'));
			?>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-lg-6" align="center">
			<?php
				echo CHtml::link('
					<img src="'.Yii::app()->baseUrl.'/images/icons/plan-cuenta.jpg" onmouseover="this.width=220;this.height=100;" onmouseout="this.width=200;this.height=150;" width="200" height="150" class="img-thumbnail box-shadow"/>
					<h4> Crear plan de cuentas<h4>',array('planCuenta/create'));
			?>
		</div>
		<div class="col-lg-6" align="center">
			<?php
				echo CHtml::link('
					<img src="'.Yii::app()->baseUrl.'/images/icons/cuenta.jpg" onmouseover="this.width=230;this.height=100;" onmouseout="this.width=210;this.height=150;" width="210" height="150"  class="img-thumbnail box-shadow"/>
					<h4>Crear Cuenta<h4>',array('cuenta/create'));
			?>
		</div>
	</div>
</div>


