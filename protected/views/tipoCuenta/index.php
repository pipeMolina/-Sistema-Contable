<?php
/* @var $this TipoCuentaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo de Cuentas',
);

$this->menu=array(
	array('label'=>'Crear TipoCuenta', 'url'=>array('create')),
	array('label'=>'Administrar TipoCuenta', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center">Tipo de Cuentas</div>
	<div class="panel-body">
		<?php $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
		)); ?>
	</div>
</div>
