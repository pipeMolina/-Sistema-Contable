<?php
/* @var $this ComprobanteContableController */
/* @var $model ComprobanteContable */

$this->breadcrumbs=array(
	'Comprobante Contables'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Ver ComprobanteContable', 'url'=>array('index')),
	array('label'=>'Crear ComprobanteContable', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#comprobante-contable-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Comprobante Contables</h1>

<!--
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
-->
<?php echo CHtml::link('Busqueda Avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'comprobante-contable-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'NUMERO_COMPROBANTE',
		'ID_TIPOCOMP',
		'RUT_EMPRESA',
		'FECHA_COMPROBANTE',
		'GLOSA_COMPROBANTE',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
