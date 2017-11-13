<?php
/* @var $this RegionController */
/* @var $model Region */

$this->breadcrumbs=array(
	'Regions'=>array('index'),
	$model->ID_REGION=>array('view','id'=>$model->ID_REGION),
	'Modificar',
);

$this->menu=array(
	array('label'=>' Region', 'url'=>array('index')),
	array('label'=>'Crear Region', 'url'=>array('create')),
	array('label'=>'Ver Region', 'url'=>array('view', 'id'=>$model->ID_REGION)),
	array('label'=>'Administrar Region', 'url'=>array('admin')),
);
?>


<div class="panel panel-primary">
	<div class="panel-heading text-center">Modificar Region <?php echo $model->ID_REGION; ?></div>
	<div class="panel-body">
		<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>