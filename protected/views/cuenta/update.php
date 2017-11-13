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

<div class="panel panel-primary">
	<div class="panel-heading text-center">Modificar Cuenta <?php echo $model->ID_CUENTA; ?></div>
	<div class="panel-body">
		<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>