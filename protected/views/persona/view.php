<?php
/* @var $this PersonaController */
/* @var $model Persona */

$this->breadcrumbs=array(
	'Personas'=>array('index'),
	$model->RUT_PERSONA,
);

$this->menu=array(
	array('label'=>'Ver Persona', 'url'=>array('index')),
	array('label'=>'Crear Persona', 'url'=>array('create')),
	array('label'=>'Actualizar Persona', 'url'=>array('update', 'id'=>$model->RUT_PERSONA)),
	array('label'=>'Borrar Persona', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->RUT_PERSONA),'confirm'=>'está usted seguro que desea eliminar del sistema este elemento?')),
	array('label'=>'Administrar Persona', 'url'=>array('admin')),
);
?>

<h1> Persona #<?php echo $model->RUT_PERSONA; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'RUT_PERSONA',
		'NOMBRE_PERSONA',
		'APELLIDO_PERSONA',
		'TELEFONO_PERSONA',
		'CORREO_PERSONA',
	),
)); ?>
