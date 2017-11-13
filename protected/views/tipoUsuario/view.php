<?php
/* @var $this TipoUsuarioController */
/* @var $model TipoUsuario */

$this->breadcrumbs=array(
	'Tipo Usuarios'=>array('index'),
	$model->ID_TIPOUSUARIO,
);

$this->menu=array(
	array('label'=>'Ver TipoUsuario', 'url'=>array('index')),
	array('label'=>'Crear TipoUsuario', 'url'=>array('create')),
	array('label'=>'Actualizar TipoUsuario', 'url'=>array('update', 'id'=>$model->ID_TIPOUSUARIO)),
	array('label'=>'Borrar TipoUsuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_TIPOUSUARIO),'confirm'=>'está usted seguro que desea eliminar del sistema este elemento?')),
	array('label'=>'Administrar TipoUsuario', 'url'=>array('admin')),
);
?>

<h1> TipoUsuario #<?php echo $model->ID_TIPOUSUARIO; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID_TIPOUSUARIO',
		'NOMBRE_TIPOSUARIO',
	),
)); ?>
