<?php
/* @var $this ComprobanteContableController */
/* @var $model ComprobanteContable */

$this->breadcrumbs=array(
	'Comprobante Contables'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Ver ComprobanteContable', 'url'=>array('index')),
	array('label'=>'Administrar ComprobanteContable', 'url'=>array('admin')),
);
?>
<div class="content">
    <?php
    $form = $this->beginWidget('DynamicTabularForm', array(
        'defaultRowView'=>'_rowForm',
    ));
    ?>
    <div div class="panel panel-primary">
    <div class="panel-heading text-center"><h1 class="panel-title">Crear Comprobante Contable</h1></div>
        <div class="panel-body">
            <?php $this->renderPartial('_form', array('model'=>$model)); ?>
        </div>
    </div>
</div>
             <?php echo $form->rowForm($modelLineas);?>
             <?php echo CHtml::submitButton('create');?>
 
<?php $this->endWidget(); ?>

<!--
 <?php
   // $form = $this->beginWidget('DynamicTabularForm', array('defaultRowView'=>'_rowForm',));
    //echo $form->errorSummary($lcdetails);
   // echo $form->rowForm($lcdetails);
	//echo CHtml::submitButton('create');
 
	//$this->endWidget();
?>
-->

	


	