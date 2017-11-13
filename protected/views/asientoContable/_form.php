<?php
/* @var $this AsientoContableController */
/* @var $model AsientoContable */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'asiento-contable-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('class'=>'form-horizontal'),

)); ?>


	<?php echo $form->errorSummary($model); ?>

	<legend><p class="note">Campos con <span class="required">*</span> son obligatorios.</p></legend>
    <!--<div class="form-group">

		<div class="col-md-12">
			<?php //echo $form->labelEx($model,'NUMERO_COMPROBANTE'); ?>
			<?php //echo $form->textField($model,'NUMERO_COMPROBANTE',array("class"=>"form-control")); ?>
			<?php //echo $form->error($model,'NUMERO_COMPROBANTE'); ?>
		</div>
	</div>-->

	<div class="form-group">
		<div class="col-md-4">
			<?php echo $form->labelEx($model,'CUENTA'); ?>
			<?php echo $form->textField($model,'CUENTA',array("class"=>"form-control",'size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'CUENTA'); ?>
		</div>
     	<div class="col-md-4">
			<?php echo $form->labelEx($model,'DEBE'); ?>
			<?php echo $form->textField($model,'DEBE',array("class"=>"form-control")); ?>
			<?php echo $form->error($model,'DEBE'); ?>
		</div>
		<div class="col-md-4">
			<?php echo $form->labelEx($model,'HABER'); ?>
			<?php echo $form->textField($model,'HABER',array("class"=>"form-control")); ?>
			<?php echo $form->error($model,'HABER'); ?>
		</div>
	</div>

	
	<div class="form-group">
		<div class="col-md-offset-1 col-md-11">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array("class"=>"btn btn-primary")); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->