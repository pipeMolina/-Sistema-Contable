<?php
/* @var $this TipoCuentaController */
/* @var $model TipoCuenta */

$this->breadcrumbs=array(
	'Tipo Cuentas'=>array('index'),
	$model->ID_TIPOCUENTA=>array('view','id'=>$model->ID_TIPOCUENTA),
	'Modificar',
);

$this->menu=array(
	array('label'=>' TipoCuenta', 'url'=>array('index')),
	array('label'=>'Crear TipoCuenta', 'url'=>array('create')),
	array('label'=>'Ver TipoCuenta', 'url'=>array('view', 'id'=>$model->ID_TIPOCUENTA)),
	array('label'=>'Administrar TipoCuenta', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center">Modificar Tipo de Cuenta <?php echo $model->ID_TIPOCUENTA; ?></div>
	<div class="panel-body">
		<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>	