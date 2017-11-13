<?php
/* @var $this PlanCuentaController */
/* @var $model PlanCuenta */

$this->breadcrumbs=array(
	'Plan Cuentas'=>array('index'),
	$model->ID_PLANCUENTA=>array('view','id'=>$model->ID_PLANCUENTA),
	'Modificar',
);

$this->menu=array(
	array('label'=>' PlanCuenta', 'url'=>array('index')),
	array('label'=>'Crear PlanCuenta', 'url'=>array('create')),
	array('label'=>'Ver PlanCuenta', 'url'=>array('view', 'id'=>$model->ID_PLANCUENTA)),
	array('label'=>'Administrar PlanCuenta', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center">Modificar Plan de Cuenta <?php echo $model->ID_PLANCUENTA; ?></div>
	<div class="panel-body">
		<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>