<?php
/* @var $this PlanCuentaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Plan Cuentas',
);

$this->menu=array(
	array('label'=>'Crear PlanCuenta', 'url'=>array('create')),
	array('label'=>'Administrar PlanCuenta', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center">Plan de Cuentas</div>
	<div class="panel-body">
		<?php $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
		)); ?>
	</div>
</div>
