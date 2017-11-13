<?php
/* @var $this PlanCuentaController */
/* @var $model PlanCuenta */

$this->breadcrumbs=array(
	'Plan Cuentas'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Ver PlanCuenta', 'url'=>array('index')),
	array('label'=>'Administrar PlanCuenta', 'url'=>array('admin')),
);
?>

<div div class="panel panel-primary">
	<div class="panel-heading text-center"><h1 class="panel-title">Crear Plan de Cuenta</h1></div>
		<div class="panel-body">
			<?php $this->renderPartial('_form', array('model'=>$model)); ?>
		</div>
	</div>
</div>