<?php
/* @var $this UsuarioController */
/* @var $model Usuario */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Ver Usuario', 'url'=>array('index')),
	array('label'=>'Administrar Usuario', 'url'=>array('admin')),
);
?>

<div div class="panel panel-primary">
	<div class="panel-heading text-center"><h1 class="panel-title">Crear Usuario</h1></div>
		<div class="panel-body">
			<?php $this->renderPartial('_form', array('model'=>$model,'modelPersona'=>$modelPersona)); ?>
		</div>
	</div>
</div>