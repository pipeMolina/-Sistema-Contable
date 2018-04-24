<?php
/* @var $this CiudadController */
/* @var $model Ciudad */

$this->breadcrumbs=array(
	'Ciudad'=>array('index'),
	$model->ID_CIUDAD=>array('view','id'=>$model->ID_CIUDAD),
	'Modificar',
);

$this->menu=array(
	array('label'=>' Ciudad', 'url'=>array('index')),
	array('label'=>'Crear Ciudad', 'url'=>array('create')),
	array('label'=>'Ver Ciudad', 'url'=>array('view', 'id'=>$model->ID_CIUDAD)),
	array('label'=>'Administrar Ciudad', 'url'=>array('admin')),
);
?>


<div class="panel panel-primary">
	<div class="panel-heading text-center">Modificar Ciudad <?php echo $model->ID_CIUDAD; ?></div>
	<div class="panel-body">
		<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>