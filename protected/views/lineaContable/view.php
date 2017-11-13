<?php
/* @var $this LineaContableController */
/* @var $model LineaContable */

$this->breadcrumbs=array(
	'Linea Contables'=>array('index'),
	$model->ID_LINEACONTABLE,
);

$this->menu=array(
	array('label'=>'Ver LineaContable', 'url'=>array('index')),
	array('label'=>'Crear LineaContable', 'url'=>array('create')),
	array('label'=>'Actualizar LineaContable', 'url'=>array('update', 'id'=>$model->ID_LINEACONTABLE)),
	array('label'=>'Borrar LineaContable', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_LINEACONTABLE),'confirm'=>'está usted seguro que desea eliminar del sistema este elemento?')),
	array('label'=>'Administrar LineaContable', 'url'=>array('admin')),
);
?>

<h1> LineaContable #<?php echo $model->ID_LINEACONTABLE; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID_LINEACONTABLE',
		'NUMERO_COMPROBANTE',
		'DEBE',
		'HABER',
		'CUENTA',
	),
)); ?>
