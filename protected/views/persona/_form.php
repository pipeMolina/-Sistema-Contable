<?php
/* @var $this PersonaController */
/* @var $model Persona */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'persona-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model,$modelusuario); ?>
	<div class="form-group">
		<div class="col-md-6">
			<?php echo $form->labelEx($model,'RUT_PERSONA'); ?>
			<?php echo $form->textField($model,'RUT_PERSONA',array("class"=>"form-control",'size'=>12,'maxlength'=>12)); ?>
			<?php echo $form->error($model,'RUT_PERSONA'); ?>
		</div>

		<div class="col-md-6">
			<?php echo $form->labelEx($model,'NOMBRE_PERSONA'); ?>
			<?php echo $form->textField($model,'NOMBRE_PERSONA',array("class"=>"form-control",'size'=>20,'maxlength'=>20)); ?>
			<?php echo $form->error($model,'NOMBRE_PERSONA'); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-6">
			<?php echo $form->labelEx($model,'APELLIDO_PERSONA'); ?>
			<?php echo $form->textField($model,'APELLIDO_PERSONA',array("class"=>"form-control",'size'=>20,'maxlength'=>20)); ?>
			<?php echo $form->error($model,'APELLIDO_PERSONA'); ?>
		</div>

		<div class="col-md-6">
			<?php echo $form->labelEx($model,'TELEFONO_PERSONA'); ?>
			<?php echo $form->textField($model,'TELEFONO_PERSONA',array("class"=>"form-control")); ?>
			<?php echo $form->error($model,'TELEFONO_PERSONA'); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-12">
			<?php echo $form->labelEx($model,'CORREO_PERSONA'); ?>
			<?php echo $form->textField($model,'CORREO_PERSONA',array("class"=>"form-control",'size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'CORREO_PERSONA'); ?>
		</div>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->