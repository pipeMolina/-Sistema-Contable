<?php
/* @var $this CiudadController */
/* @var $model Ciudad */

$this->breadcrumbs=array(
	'Ciudad'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Ver Ciudad', 'url'=>array('index')),
	array('label'=>'Crear Ciudad', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ciudad-grid').yiiGridView('update', 
	{
		data: $(this).serialize()
	});
	return false;
});
");
?>

<!--
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
-->
<?php //echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php //$this->renderPartial('_search',array(
	//'model'=>$model,
//)); ?>
</div><!-- search-form -->

<div class="panel panel-primary">
	<div class="panel-heading text-center">Administrar Ciudad</div>
	<div class="panel-body">
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'ciudad-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'columns'=>array(
				'ID_CIUDAD',
				//'ID_REGION',
				array(
					'name'  => "ID_REGION",
					'header'=> 'region',
					'value' => '$data->iDREGION->NOMBRE_REGION',
					'filter'=> CHtml::listData(Region::model()->findAll(array('order'=>'NOMBRE_REGION')),'ID_REGION','NOMBRE_REGION'),
				),
				'NOMBRE_CIUDAD',
				array(
					'class'=>'CButtonColumn',
				),
			),
		)); ?>
	</div>
</div>
