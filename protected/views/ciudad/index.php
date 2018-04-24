<?php
/* @var $this CiudadController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ciudad',
);

$this->menu=array(
	array('label'=>'Crear Ciudad', 'url'=>array('create')),
	array('label'=>'Administrar Ciudad', 'url'=>array('admin')),
);
?>


<div class="panel panel-primary">
	<div class="panel-heading text-center">Ciudad</div>
	<div class="panel-body">
		<?php $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
		)); ?>
	</div>
</div>

