<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->RUT_PERSONA=>array('view','id'=>$model->RUT_PERSONA),
	'Modificar',
);

$this->menu=array(
	array('label'=>' Usuario', 'url'=>array('index')),
	array('label'=>'Crear Usuario', 'url'=>array('create')),
	array('label'=>'Ver Usuario', 'url'=>array('view', 'id'=>$model->RUT_PERSONA)),
	array('label'=>'Administrar Usuario', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center">Modificar Usuario <?php echo $model->RUT_PERSONA; ?></div>
	<div class="panel-body">
		<?php $this->renderPartial('_form', array('model'=>$model,'modelPersona'=>$modelPersona)); ?>
	</div>
</div>