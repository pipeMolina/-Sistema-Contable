<?php
/* @var $this PlanCuentaController */
/* @var $model PlanCuenta */

$this->breadcrumbs=array(
	'Plan Cuentas'=>array('index'),
	$model->ID_PLANCUENTA,
);

$this->menu=array(
	array('label'=>'Ver PlanCuenta', 'url'=>array('index')),
	array('label'=>'Crear PlanCuenta', 'url'=>array('create')),
	array('label'=>'Actualizar PlanCuenta', 'url'=>array('update', 'id'=>$model->ID_PLANCUENTA)),
	array('label'=>'Borrar PlanCuenta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_PLANCUENTA),'confirm'=>'está usted seguro que desea eliminar del sistema este elemento?')),
	array('label'=>'Administrar PlanCuenta', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center">Plan de Cuentas #<?php echo $model->DESCRIPCION_PLANCUENTA?></div>
	<div class="panel-body">
		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'ID_PLANCUENTA',
				'DESCRIPCION_PLANCUENTA',
			),
		)); ?>
	</div>
</div>

