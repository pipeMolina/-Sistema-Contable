<?php
/* @var $this ComprobanteContableController */
/* @var $model ComprobanteContable */

$this->breadcrumbs=array(
	'Comprobante Contables'=>array('index'),
	$model->NUMERO_COMPROBANTE=>array('view','id'=>$model->NUMERO_COMPROBANTE),
	'Modificar',
);

$this->menu=array(
	array('label'=>' ComprobanteContable', 'url'=>array('index')),
	array('label'=>'Crear ComprobanteContable', 'url'=>array('create')),
	array('label'=>'Ver ComprobanteContable', 'url'=>array('view', 'id'=>$model->NUMERO_COMPROBANTE)),
	array('label'=>'Administrar ComprobanteContable', 'url'=>array('admin')),
);
?>

<h1>Modificar ComprobanteContable <?php echo $model->NUMERO_COMPROBANTE; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>