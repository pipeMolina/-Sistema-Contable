<?php
/* @var $this TipoCuentaController */
/* @var $model TipoCuenta */

$this->breadcrumbs=array(
	'Tipo Cuentas'=>array('index'),
	$model->ID_TIPOCUENTA,
);

$this->menu=array(
	array('label'=>'Ver TipoCuenta', 'url'=>array('index')),
	array('label'=>'Crear TipoCuenta', 'url'=>array('create')),
	array('label'=>'Actualizar TipoCuenta', 'url'=>array('update', 'id'=>$model->ID_TIPOCUENTA)),
	array('label'=>'Borrar TipoCuenta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_TIPOCUENTA),'confirm'=>'está usted seguro que desea eliminar del sistema este elemento?')),
	array('label'=>'Administrar TipoCuenta', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center">Tipo de Cuenta #<?php echo $model->ID_TIPOCUENTA; ?></div>
	<div class="panel-body">
		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'ID_TIPOCUENTA',
				'NOMBRE_TIPOCUENTA',
			),
		)); ?>
	</div>
</div>
