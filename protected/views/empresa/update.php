<?php
/* @var $this EmpresaController */
/* @var $model Empresa */

$this->breadcrumbs=array(
	'Empresas'=>array('index'),
	$model->RUT_EMPRESA=>array('view','id'=>$model->RUT_EMPRESA),
	'Modificar',
);

$this->menu=array(
	array('label'=>' Empresa', 'url'=>array('index')),
	array('label'=>'Crear Empresa', 'url'=>array('create')),
	array('label'=>'Ver Empresa', 'url'=>array('view', 'id'=>$model->RUT_EMPRESA)),
	array('label'=>'Administrar Empresa', 'url'=>array('admin')),
);
?>

<h1>Modificar Empresa <?php echo $model->RUT_EMPRESA; ?></h1>
<div class="panel panel-primary">
	<div class="panel-heading text-center">Modificar Empresa <?php echo $model->RUT_EMPRESA; ?></div>
	<div class="panel-body">
		<?php $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>