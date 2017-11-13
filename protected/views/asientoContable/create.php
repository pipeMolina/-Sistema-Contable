<?php
/* @var $this AsientoContableController */
/* @var $model AsientoContable */

$this->breadcrumbs=array(
	'Asiento Contables'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Ver AsientoContable', 'url'=>array('index')),
	array('label'=>'Administrar AsientoContable', 'url'=>array('admin')),
);
?>

<h1>Crear AsientoContable</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>