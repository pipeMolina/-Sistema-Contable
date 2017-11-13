<?php
/* @var $this AsientoContableController */
/* @var $model AsientoContable */

$this->breadcrumbs=array(
	'Asiento Contables'=>array('index'),
	$model->ID_ASIENTOCONTABLE,
);

$this->menu=array(
	array('label'=>'Ver AsientoContable', 'url'=>array('index')),
	array('label'=>'Crear AsientoContable', 'url'=>array('create')),
	array('label'=>'Actualizar AsientoContable', 'url'=>array('update', 'id'=>$model->ID_ASIENTOCONTABLE)),
	array('label'=>'Borrar AsientoContable', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_ASIENTOCONTABLE),'confirm'=>'está usted seguro que desea eliminar del sistema este elemento?')),
	array('label'=>'Administrar AsientoContable', 'url'=>array('admin')),
);
?>

<h1> AsientoContable #<?php echo $model->ID_ASIENTOCONTABLE; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID_ASIENTOCONTABLE',
		'NUMERO_COMPROBANTE',
		'DEBE',
		'HABER',
		'CUENTA',
	),
)); ?>
