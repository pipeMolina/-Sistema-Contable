<?php
/* @var $this ComprobanteContableController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Comprobante Contables',
);

$this->menu=array(
	array('label'=>'Crear ComprobanteContable', 'url'=>array('create')),
	array('label'=>'Administrar ComprobanteContable', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center">Comprobantes Contables</div>
		<div class="panel-body">
			<?php $this->widget('zii.widgets.CListView', array(
				'dataProvider'=>$dataProvider,
				'itemView'=>'_view',
			)); ?>
		</div>
</div>