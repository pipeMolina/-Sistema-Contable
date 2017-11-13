<?php
/* @var $this AsientoContableController */
/* @var $model AsientoContable */

$this->breadcrumbs=array(
	'Asiento Contables'=>array('index'),
	$model->ID_ASIENTOCONTABLE=>array('view','id'=>$model->ID_ASIENTOCONTABLE),
	'Modificar',
);

$this->menu=array(
	array('label'=>' AsientoContable', 'url'=>array('index')),
	array('label'=>'Crear AsientoContable', 'url'=>array('create')),
	array('label'=>'Ver AsientoContable', 'url'=>array('view', 'id'=>$model->ID_ASIENTOCONTABLE)),
	array('label'=>'Administrar AsientoContable', 'url'=>array('admin')),
);
?>

<h1>Modificar AsientoContable <?php echo $model->ID_ASIENTOCONTABLE; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>