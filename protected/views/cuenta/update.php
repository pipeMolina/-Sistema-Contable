<?php
/* @var $this CuentaController */
/* @var $model Cuenta */

$this->breadcrumbs=array(
	'Cuentas'=>array('index'),
	$model->ID_CUENTA=>array('view','id'=>$model->ID_CUENTA),
	'Modificar',
);

$this->menu=array(
	array('label'=>' Cuenta', 'url'=>array('index')),
	array('label'=>'Crear Cuenta', 'url'=>array('create')),
	array('label'=>'Ver Cuenta', 'url'=>array('view', 'id'=>$model->ID_CUENTA)),
	array('label'=>'Administrar Cuenta', 'url'=>array('admin')),
);
?>
	<?php $this->renderPartial('_formUpdate', array('model'=>$model)); ?>