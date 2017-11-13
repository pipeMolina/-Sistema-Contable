<?php
/* @var $this LineaContableController */
/* @var $model LineaContable */

$this->breadcrumbs=array(
	'Linea Contables'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Ver LineaContable', 'url'=>array('index')),
	array('label'=>'Administrar LineaContable', 'url'=>array('admin')),
);
?>

<div div class="panel panel-primary">
	<div class="panel-heading text-center"><h1 class="panel-title">Crear Plan de Cuenta</h1></div>
		<div class="panel-body">
			<?php $this->renderPartial('_form', array('model'=>$model)); ?>
		</div>
</div>