<?php
/* @var $this SubtipoCuentaController */
/* @var $model SubtipoCuenta */

$this->breadcrumbs=array(
	'Subtipo Cuentas'=>array('index'),
	$model->ID_SUBTIPOCUENTA,
);

$this->menu=array(
	array('label'=>'Ver SubtipoCuenta', 'url'=>array('index')),
	array('label'=>'Crear SubtipoCuenta', 'url'=>array('create')),
	array('label'=>'Actualizar SubtipoCuenta', 'url'=>array('update', 'id'=>$model->ID_SUBTIPOCUENTA)),
	array('label'=>'Borrar SubtipoCuenta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_SUBTIPOCUENTA),'confirm'=>'está usted seguro que desea eliminar del sistema este elemento?')),
	array('label'=>'Administrar SubtipoCuenta', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center">SubtipoCuenta #<?php echo $model->ID_SUBTIPOCUENTA; ?></div>
	<div class="panel-body">
		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'ID_SUBTIPOCUENTA',
				'ID_TIPOCUENTA',
				'NOMBRE_SUBTIPOCUENTA',
			),
		)); ?>
	</div>	
</div>
