<?php
/* @var $this CuentaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cuentas',
);

$this->menu=array(
	array('label'=>'Crear Cuenta', 'url'=>array('create')),
	array('label'=>'Administrar Cuenta', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center">Cuentas</div>
	<div class="panel-body">
		<?php $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
		)); ?>
	</div>
</div>
