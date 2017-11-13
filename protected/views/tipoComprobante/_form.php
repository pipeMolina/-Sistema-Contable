<?php
/* @var $this TipoComprobanteController */
/* @var $model TipoComprobante */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tipo-comprobante-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('class'=>'form-horizontal'),

)); ?>

	<?php echo $form->errorSummary($model); ?>

	<legend><p class="note">Campos con <span class="required">*</span> son obligatorios.</p></legend>
    <div class="form-group">
     	<div class="col-md-4">
			<?php echo $form->labelEx($model,'ID_TIPOCOMP'); ?>
			<?php echo $form->textField($model,'ID_TIPOCOMP',array("class"=>"form-control")); ?>
			<?php echo $form->error($model,'ID_TIPOCOMP'); ?>
		</div>
		<div class="col-md-8">
			<?php echo $form->labelEx($model,'NOMBRE_TIPOCOMP'); ?>
			<?php echo $form->textField($model,'NOMBRE_TIPOCOMP',array("class"=>"form-control",'size'=>20,'maxlength'=>20)); ?>
			<?php echo $form->error($model,'NOMBRE_TIPOCOMP'); ?>
		</div>
	</div>

	<!--<div class="form-group">
     	<div class="col-md-12">
			<?php //echo $form->labelEx($model,'NOMBRE_TIPOCOMP'); ?>
			<?php //echo $form->textField($model,'NOMBRE_TIPOCOMP',array("class"=>"form-control",'size'=>20,'maxlength'=>20)); ?>
			<?php //echo $form->error($model,'NOMBRE_TIPOCOMP'); ?>
		</div>
	</div>-->

	<div class="form-group">
		<div class="col-md-offset-1 col-md-11">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array("class"=>"btn btn-primary")); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->