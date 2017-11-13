<?php
/* @var $this TipoComprobanteController */
/* @var $model TipoComprobante */

$this->breadcrumbs=array(
	'Tipo Comprobantes'=>array('index'),
	$model->ID_TIPOCOMP=>array('view','id'=>$model->ID_TIPOCOMP),
	'Modificar',
);

$this->menu=array(
	array('label'=>' TipoComprobante', 'url'=>array('index')),
	array('label'=>'Crear TipoComprobante', 'url'=>array('create')),
	array('label'=>'Ver TipoComprobante', 'url'=>array('view', 'id'=>$model->ID_TIPOCOMP)),
	array('label'=>'Administrar TipoComprobante', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center">Modificar Tipo Comprobante <?php echo $model->ID_TIPOCOMP; ?></div>
	<div class="panel-body">
		<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>	