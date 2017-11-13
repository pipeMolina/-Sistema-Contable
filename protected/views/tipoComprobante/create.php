<?php
/* @var $this TipoComprobanteController */
/* @var $model TipoComprobante */

$this->breadcrumbs=array(
	'Tipo Comprobantes'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Ver TipoComprobante', 'url'=>array('index')),
	array('label'=>'Administrar TipoComprobante', 'url'=>array('admin')),
);
?>

<div div class="panel panel-primary">
	<div class="panel-heading text-center"><h1 class="panel-title">Crear Tipo Comprobante</h1></div>
		<div class="panel-body">
			<?php $this->renderPartial('_form', array('model'=>$model)); ?>
		</div>
	</div>
</div>