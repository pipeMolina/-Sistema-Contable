<?php
/* @var $this TipoUsuarioController */
/* @var $model TipoUsuario */

$this->breadcrumbs=array(
	'Tipo Usuarios'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Ver TipoUsuario', 'url'=>array('index')),
	array('label'=>'Administrar TipoUsuario', 'url'=>array('admin')),
);
?>

<h1>Crear TipoUsuario</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>