<?php
/* @var $this TipoCuentaController */
/* @var $model TipoCuenta */

$this->breadcrumbs=array(
	'Tipo Cuentas'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Ver TipoCuenta', 'url'=>array('index')),
	array('label'=>'Administrar TipoCuenta', 'url'=>array('admin')),
);
?>

<div div class="panel panel-primary">
	<div class="panel-heading text-center"><h1 class="panel-title">Crear Tipo Cuenta</h1></div>
		<div class="panel-body">
			<?php $this->renderPartial('_form', array('model'=>$model)); ?>
		</div>
	</div>
</div>