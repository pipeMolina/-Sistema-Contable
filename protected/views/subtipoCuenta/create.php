<?php
/* @var $this SubtipoCuentaController */
/* @var $model SubtipoCuenta */

$this->breadcrumbs=array(
	'Subtipo Cuentas'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Ver SubtipoCuenta', 'url'=>array('index')),
	array('label'=>'Administrar SubtipoCuenta', 'url'=>array('admin')),
);
?>

<div div class="panel panel-primary">
	<div class="panel-heading text-center"><h1 class="panel-title">Crear Subtipo Cuenta</h1></div>
		<div class="panel-body">
			<?php $this->renderPartial('_form', array('model'=>$model)); ?>
		</div>
	</div>
</div>