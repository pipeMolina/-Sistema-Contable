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

<!--
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>
-->
<div class="panel panel-primary">
	<div class="panel-heading text-center">Administrar Comprobantes</div>
		<div class="panel-body">
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
					//'ID_TIPOCOMP',
					array(
						'name'  => "ID_TIPOCOMP",
						'header'=> 'Tipo',
						'value' => '$data->iDTIPOCOMP->NOMBRE_TIPOCOMP',
						'filter'=> CHtml::listData(TipoComprobante::model()->findAll(array('order'=>'NOMBRE_TIPOCOMP')),'ID_TIPOCOMP','NOMBRE_TIPOCOMP'),
					),
					'RUT_EMPRESA',
					'FECHA_COMPROBANTE',
					'GLOSA_COMPROBANTE',
					array(
						'class'=>'CButtonColumn',
					),
				),
			)); ?>
		</div>
</div>
