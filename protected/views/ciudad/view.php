<?php
/* @var $this CiudadController */
/* @var $model Ciudad */

$this->breadcrumbs=array(
	'Ciudads'=>array('index'),
	$model->ID_CIUDAD,
);

$this->menu=array(
	array('label'=>'Ver Ciudad', 'url'=>array('index')),
	array('label'=>'Crear Ciudad', 'url'=>array('create')),
	array('label'=>'Actualizar Ciudad', 'url'=>array('update', 'id'=>$model->ID_CIUDAD)),
	array('label'=>'Borrar Ciudad', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_CIUDAD),'confirm'=>'está usted seguro que desea eliminar del sistema este elemento?')),
	array('label'=>'Administrar Ciudad', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center">Ciudad #<?php echo $model->ID_CIUDAD; ?></div>
	<div class="panel-body">
		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'ID_CIUDAD',
				//'ID_REGION',
				array(
					'name'  => "ID_REGION",
					'value' => $model->iDREGION->NOMBRE_REGION,
					'filter'=> CHtml::listData(Region::model()->findAll(array('order'=>'NOMBRE_REGION')),'ID_REGION','NOMBRE_REGION'),
				),
				'NOMBRE_CIUDAD',
			),
		)); ?>
	</div>
</div>
