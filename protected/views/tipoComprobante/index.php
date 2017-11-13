<?php
/* @var $this TipoComprobanteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Comprobantes',
);

$this->menu=array(
	array('label'=>'Crear TipoComprobante', 'url'=>array('create')),
	array('label'=>'Administrar TipoComprobante', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center">Tipo Comprobantes</div>
	<div class="panel-body">
		<?php $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
		)); ?>
	</div>
</div>
