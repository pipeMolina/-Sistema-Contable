<?php
/* @var $this ComprobanteContableController */
/* @var $model ComprobanteContable */

$this->breadcrumbs=array(
	'Comprobante Contables'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Ver ComprobanteContable', 'url'=>array('index')),
	array('label'=>'Administrar ComprobanteContable', 'url'=>array('admin')),
);
?>
   <?php $this->renderPartial('_form', array('model'=>$model,'modelLinea'=>$modelLinea)); ?>





	