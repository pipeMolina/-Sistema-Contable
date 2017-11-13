<?php
/* @var $this TipoComprobanteController */
/* @var $model TipoComprobante */

$this->breadcrumbs=array(
	'Tipo Comprobantes'=>array('index'),
	$model->ID_TIPOCOMP,
);

$this->menu=array(
	array('label'=>'Ver TipoComprobante', 'url'=>array('index')),
	array('label'=>'Crear TipoComprobante', 'url'=>array('create')),
	array('label'=>'Actualizar TipoComprobante', 'url'=>array('update', 'id'=>$model->ID_TIPOCOMP)),
	array('label'=>'Borrar TipoComprobante', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_TIPOCOMP),'confirm'=>'está usted seguro que desea eliminar del sistema este elemento?')),
	array('label'=>'Administrar TipoComprobante', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center">Tipo Comprobante #<?php echo $model->ID_TIPOCOMP; ?></div>
	<div class="panel-body">
		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'ID_TIPOCOMP',
				'NOMBRE_TIPOCOMP',
			),
		)); ?>
	</div>
</div>
