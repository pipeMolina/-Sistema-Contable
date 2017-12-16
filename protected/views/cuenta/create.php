<?php
/* @var $this CuentaController */
/* @var $model Cuenta */

$this->breadcrumbs=array(
	'Cuentas'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Ver Cuenta', 'url'=>array('index')),
	array('label'=>'Administrar Cuenta', 'url'=>array('admin')),

);
?>
	<?php $this->renderPartial('_form', array('model'=>$model)); ?>
       



