<?php
/* @var $this SubtipoCuentaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Subtipo Cuentas',
);

$this->menu=array(
	array('label'=>'Crear SubtipoCuenta', 'url'=>array('create')),
	array('label'=>'Administrar SubtipoCuenta', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center">Subtipo Cuentas</div>
	<div class="panel-body">
		<?php $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
		)); ?>
	</div>
</div>
