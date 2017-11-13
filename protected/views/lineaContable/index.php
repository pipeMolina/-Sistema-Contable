<?php
/* @var $this LineaContableController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Linea Contables',
);

$this->menu=array(
	array('label'=>'Crear LineaContable', 'url'=>array('create')),
	array('label'=>'Administrar LineaContable', 'url'=>array('admin')),
);
?>

<h1>Linea Contables</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
