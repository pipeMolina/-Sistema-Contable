<?php
/* @var $this RegionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Regions',
);

$this->menu=array(
	array('label'=>'Crear Region', 'url'=>array('create')),
	array('label'=>'Administrar Region', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center">Region</div>
	<div class="panel-body">
		<?php $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
		)); ?>
	</div>
</div>
