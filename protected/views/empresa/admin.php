<?php
/* @var $this EmpresaController */
/* @var $model Empresa */

$this->breadcrumbs=array(
	'Empresas'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Ver Empresa', 'url'=>array('index')),
	array('label'=>'Crear Empresa', 'url'=>array('create')),
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#empresa-grid').yiiGridView('update', {
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
</div>

<div class="panel panel-primary">
	<div class="panel-heading text-center">Administrar Empresa</div>
	<div class="panel-body">
		<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'empresa-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'RUT_EMPRESA',
		'ID_CIUDAD',
		'ID_PLANCUENTA',
		'RAZONSOCIAL_EMPRESA',
		'GIRO_EMPRESA',
		'TELEFONO_EMPRESA',
		'CORREO',
		
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
	</div>
</div>

