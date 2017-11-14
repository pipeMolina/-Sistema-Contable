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

    <div div class="panel panel-primary">
    <div class="panel-heading text-center"><h1 class="panel-title">Crear Comprobante Contable</h1></div>
        <div class="panel-body">
            <?php $this->renderPartial('_form', array('model'=>$model)); ?>
        </div>
    </div>
	


	