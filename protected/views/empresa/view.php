<?php
/* @var $this EmpresaController */
/* @var $model Empresa */

$this->breadcrumbs=array(
	'Empresas'=>array('index'),
	$model->RUT_EMPRESA,
);

$this->menu=array(
	array('label'=>'Ver Empresa', 'url'=>array('index')),
	array('label'=>'Crear Empresa', 'url'=>array('create')),
	array('label'=>'Actualizar Empresa', 'url'=>array('update', 'id'=>$model->RUT_EMPRESA)),
	array('label'=>'Borrar Empresa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->RUT_EMPRESA),'confirm'=>'está usted seguro que desea eliminar del sistema este elemento?')),
	array('label'=>'Administrar Empresa', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center">Empresa #<?php echo $model->RUT_EMPRESA; ?></div>
	<div class="panel-body">
		<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'RUT_EMPRESA',
				//'ID_CIUDAD',
				array(
	   					'name'=>'ID_CIUDAD',
	   					'value'=>$model->iDCIUDAD->NOMBRE_CIUDAD,
  					),
				//'ID_PLANCUENTA',
				array(
	   					'name'=>'ID_PLANCUENTA',
	   					'value'=>$model->iDPLANCUENTA->DESCRIPCION_PLANCUENTA,
  					),
				'RAZONSOCIAL_EMPRESA',
				'GIRO_EMPRESA',
				'TELEFONO_EMPRESA',
				'CORREO',
			),
		)); ?>
	</div>
</div>