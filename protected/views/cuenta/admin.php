<?php
/* @var $this CuentaController */
/* @var $model Cuenta */

$this->breadcrumbs=array(
	'Cuentas'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Ver Cuenta', 'url'=>array('index')),
	array('label'=>'Crear Cuenta', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cuenta-grid').yiiGridView('update', {
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
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<div class="panel panel-primary">
	<div class="panel-heading text-center">Administrar Cuentas:<?php ?></div>
	<div class="panel-body">
		<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'cuenta-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'columns'=>array(
				//'ID_PLANCUENTA',
				array(
   					'name'=>'ID_PLANCUENTA',
   					'value'=>'$data->iDPLANCUENTA->DESCRIPCION_PLANCUENTA',
   					'filter'=> CHtml::listData(PlanCuenta::model()->findAll(array('order'=>'DESCRIPCION_PLANCUENTA')),'ID_PLANCUENTA','DESCRIPCION_PLANCUENTA')
  				),
				'DESCRIPCION_CUENTA',
				'CODIGO_CUENTA',
				//'ID_TIPOCUENTA',
				array(
   					'name'=>'ID_TIPOCUENTA',
   					'value'=>'$data->iDTIPOCUENTA->NOMBRE_TIPOCUENTA',
   					'filter'=> CHtml::listData(TipoCuenta::model()->findAll(array('order'=>'NOMBRE_TIPOCUENTA')),'ID_TIPOCUENTA','NOMBRE_TIPOCUENTA')
  				),
				//'ID_SUBTIPOCUENTA',
				array(
   					'name'=>'ID_SUBTIPOCUENTA',
   					'value'=>'$data->iDSUBTIPOCUENTA->NOMBRE_SUBTIPOCUENTA',
   					'filter'=> CHtml::listData(SubtipoCuenta::model()->findAll(array('order'=>'NOMBRE_SUBTIPOCUENTA')),'ID_SUBTIPOCUENTA','NOMBRE_SUBTIPOCUENTA')
  				),
				array(
					'class'=>'CButtonColumn',
				),
			),
		)); ?>
	</div>
</div>
