<?php
/* @var $this SubtipoCuentaController */
/* @var $model SubtipoCuenta */

$this->breadcrumbs=array(
	'Subtipo Cuentas'=>array('index'),
	$model->ID_SUBTIPOCUENTA=>array('view','id'=>$model->ID_SUBTIPOCUENTA),
	'Modificar',
);

$this->menu=array(
	array('label'=>' SubtipoCuenta', 'url'=>array('index')),
	array('label'=>'Crear SubtipoCuenta', 'url'=>array('create')),
	array('label'=>'Ver SubtipoCuenta', 'url'=>array('view', 'id'=>$model->ID_SUBTIPOCUENTA)),
	array('label'=>'Administrar SubtipoCuenta', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center">Modificar SubtipoCuenta <?php echo $model->ID_SUBTIPOCUENTA; ?></div>
	<div class="panel-body">
		<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>