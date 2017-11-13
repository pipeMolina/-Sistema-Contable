<?php
/* @var $this TipoUsuarioController */
/* @var $model TipoUsuario */

$this->breadcrumbs=array(
	'Tipo Usuarios'=>array('index'),
	$model->ID_TIPOUSUARIO=>array('view','id'=>$model->ID_TIPOUSUARIO),
	'Modificar',
);

$this->menu=array(
	array('label'=>' TipoUsuario', 'url'=>array('index')),
	array('label'=>'Crear TipoUsuario', 'url'=>array('create')),
	array('label'=>'Ver TipoUsuario', 'url'=>array('view', 'id'=>$model->ID_TIPOUSUARIO)),
	array('label'=>'Administrar TipoUsuario', 'url'=>array('admin')),
);
?>

<h1>Modificar TipoUsuario <?php echo $model->ID_TIPOUSUARIO; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>