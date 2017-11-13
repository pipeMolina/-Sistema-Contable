<?php
/* @var $this LineaContableController */
/* @var $model LineaContable */

$this->breadcrumbs=array(
	'Linea Contables'=>array('index'),
	$model->ID_LINEACONTABLE=>array('view','id'=>$model->ID_LINEACONTABLE),
	'Modificar',
);

$this->menu=array(
	array('label'=>' LineaContable', 'url'=>array('index')),
	array('label'=>'Crear LineaContable', 'url'=>array('create')),
	array('label'=>'Ver LineaContable', 'url'=>array('view', 'id'=>$model->ID_LINEACONTABLE)),
	array('label'=>'Administrar LineaContable', 'url'=>array('admin')),
);
?>

<h1>Modificar LineaContable <?php echo $model->ID_LINEACONTABLE; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>