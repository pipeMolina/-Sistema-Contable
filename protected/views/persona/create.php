<?php
/* @var $this PersonaController */
/* @var $model Persona */

$this->breadcrumbs=array(
	'Personas'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Ver Persona', 'url'=>array('index')),
	array('label'=>'Administrar Persona', 'url'=>array('admin')),
);
?>

<h1>Crear Persona</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'modelusuario'=>$modelusuario)); ?>