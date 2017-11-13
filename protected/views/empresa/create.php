<?php
/* @var $this EmpresaController */
/* @var $model Empresa */

$this->breadcrumbs=array(
	'Empresas'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Ver Empresa', 'url'=>array('index')),
	array('label'=>'Administrar Empresa', 'url'=>array('admin')),
);
?>
<div div class="panel panel-primary">
	<div class="panel-heading text-center"><h1 class="panel-title">Crear Empresa</h1></div>
		<div class="panel-body">
			<?php $this->renderPartial('_form', array('model'=>$model)); ?>
		</div>
	</div>
</div>