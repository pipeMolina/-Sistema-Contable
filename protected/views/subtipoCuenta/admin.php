<?php
/* @var $this SubtipoCuentaController */
/* @var $model SubtipoCuenta */

$this->breadcrumbs=array(
	'Subtipo Cuentas'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Ver SubtipoCuenta', 'url'=>array('index')),
	array('label'=>'Crear SubtipoCuenta', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#subtipo-cuenta-grid').yiiGridView('update', {
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
	<div class="panel-heading text-center">Administrar Subtipo Cuenta</div>
	<div class="panel-body">
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'subtipo-cuenta-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'columns'=>array(
				'ID_SUBTIPOCUENTA',
				'ID_TIPOCUENTA',
				'NOMBRE_SUBTIPOCUENTA',
				array(
					'class'=>'CButtonColumn',
				),
			),
		)); ?>
	</div>
</div>
