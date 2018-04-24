<?php
/* @var $this CuentaController */
/* @var $model Cuenta */

$this->breadcrumbs=array(
	'Cuentas'=>array('index'),
	$model->ID_CUENTA,
);

$this->menu=array(
	array('label'=>'Ver Cuenta', 'url'=>array('index')),
	array('label'=>'Crear Cuenta', 'url'=>array('create')),
	array('label'=>'Actualizar Cuenta', 'url'=>array('update', 'id'=>$model->ID_CUENTA)),
	array('label'=>'Borrar Cuenta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_CUENTA),'confirm'=>'está usted seguro que desea eliminar del sistema este elemento?')),
	array('label'=>'Administrar Cuenta', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center">Cuenta #<?php echo $model->ID_CUENTA; ?></div>
	<div class="panel-body">
		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'ID_CUENTA',
				//'ID_TIPOCUENTA',
				array(
					'name'  => "ID_TIPOCUENTA",
					'value' => $model->iDTIPOCUENTA->NOMBRE_TIPOCUENTA,
					),
				//'ID_PLANCUENTA',
				array(
						'name'  => "ID_PLANCUENTA",
						'value' => $model->iDPLANCUENTA->DESCRIPCION_PLANCUENTA,
					),
				//'ID_SUBTIPOCUENTA',
				array(
					'name'  => "ID_SUBTIPOCUENTA",
					'value' => $model->iDSUBTIPOCUENTA->NOMBRE_SUBTIPOCUENTA,
					),
				'DESCRIPCION_CUENTA',
			),
		)); ?>
	</div>
</div>
