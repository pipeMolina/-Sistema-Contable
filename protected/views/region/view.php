<?php
/* @var $this RegionController */
/* @var $model Region */

$this->breadcrumbs=array(
	'Regions'=>array('index'),
	$model->ID_REGION,
);

$this->menu=array(
	array('label'=>'Ver Region', 'url'=>array('index')),
	array('label'=>'Crear Region', 'url'=>array('create')),
	array('label'=>'Actualizar Region', 'url'=>array('update', 'id'=>$model->ID_REGION)),
	array('label'=>'Borrar Region', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_REGION),'confirm'=>'está usted seguro que desea eliminar del sistema este elemento?')),
	array('label'=>'Administrar Region', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center">Region #<?php echo $model->ID_REGION; ?></div>
	<div class="panel-body">
		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'ID_REGION',
				'NOMBRE_REGION',
			),
		)); ?>
	</div>
</div>
