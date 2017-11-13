<?php
/* @var $this ComprobanteContableController */
/* @var $model ComprobanteContable */

$this->breadcrumbs=array(
	'Comprobante Contables'=>array('index'),
	$model->NUMERO_COMPROBANTE,
);

$this->menu=array(
	array('label'=>'Ver ComprobanteContable', 'url'=>array('index')),
	array('label'=>'Crear ComprobanteContable', 'url'=>array('create')),
	array('label'=>'Actualizar ComprobanteContable', 'url'=>array('update', 'id'=>$model->NUMERO_COMPROBANTE)),
	array('label'=>'Borrar ComprobanteContable', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->NUMERO_COMPROBANTE),'confirm'=>'está usted seguro que desea eliminar del sistema este elemento?')),
	array('label'=>'Administrar ComprobanteContable', 'url'=>array('admin')),
);
?>

<h1> ComprobanteContable #<?php echo $model->NUMERO_COMPROBANTE; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'NUMERO_COMPROBANTE',
		'ID_TIPOCOMP',
		'RUT_EMPRESA',
		'FECHA_COMPROBANTE',
		'GLOSA_COMPROBANTE',
	),
)); 
?>

