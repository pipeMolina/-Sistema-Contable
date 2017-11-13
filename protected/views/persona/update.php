<?php
/* @var $this PersonaController */
/* @var $model Persona */

$this->breadcrumbs=array(
	'Personas'=>array('index'),
	$model->RUT_PERSONA=>array('view','id'=>$model->RUT_PERSONA),
	'Modificar',
);

$this->menu=array(
	array('label'=>' Persona', 'url'=>array('index')),
	array('label'=>'Crear Persona', 'url'=>array('create')),
	array('label'=>'Ver Persona', 'url'=>array('view', 'id'=>$model->RUT_PERSONA)),
	array('label'=>'Administrar Persona', 'url'=>array('admin')),
);
?>

<h1>Modificar Persona <?php echo $model->RUT_PERSONA; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>