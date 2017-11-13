<!--<?php //$this->breadcrumbs=array(
	//'Empresas',
//);?>
<h1 class="text-center">Empresas</h1>

<div class="container">
	<div class="row buttons">
  	
		<button type="button" class="btn btn-default">
       		<?php //echo CHtml::link('<h4>Crear Empresa</h4>',array('create')); ?>
 		</button>
	
 		<button type="button" class="btn btn-default">
       		<?php //echo CHtml::link('<h4>Administrar Empresas</h4>',array('admin')); ?>
 		</button>
 		<a href="/SistemaContable/index.php?r=empresa/create" class="btn btn-primary">Crear Empresa</a>
 		<a href="/SistemaContable/index.php?r=empresa/admin" class="btn btn-primary">Administrar Empresa</a>

 	</div>
</div>-->
<?php
/* @var $this EmpresaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Empresas',
);

$this->menu=array(
	array('label'=>'Crear Empresa', 'url'=>array('create')),
	array('label'=>'Administrar Empresa', 'url'=>array('admin')),
);
?>

<div class="panel panel-primary">
	<div class="panel-heading text-center">Empresa</div>
	<div class="panel-body">
		<?php $this->widget('zii.widgets.CListView', array(
			'dataProvider'=>$dataProvider,
			'itemView'=>'_view',
		)); ?>
	</div>
</div>
