<?php
/* @var $this AsientoContableController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Asiento Contables',
);

$this->menu=array(
	array('label'=>'Crear AsientoContable', 'url'=>array('create')),
	array('label'=>'Administrar AsientoContable', 'url'=>array('admin')),
);
?>

<h1>Asiento Contables</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
