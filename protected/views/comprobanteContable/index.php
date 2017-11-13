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

<h1>Comprobante Contables</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
