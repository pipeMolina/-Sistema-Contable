<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
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
			<?php echo $form->labelEx($model,'RUT_PERSONA'); ?>
			<?php echo $form->textField($model,'RUT_PERSONA',array("class"=>"form-control",'size'=>12,'maxlength'=>12)); ?>
			<?php echo $form->error($model,'RUT_PERSONA'); ?>
		</div>
	</div>
    <div class="form-group">
		<div class="col-md-12">
			<?php echo $form->labelEx($model,'ID_TIPOUSUARIO'); ?>
			<?php echo $form->textField($model,'ID_TIPOUSUARIO',array("class"=>"form-control")); ?>
			<?php echo $form->error($model,'ID_TIPOUSUARIO'); ?>
		</div>
	</div>

	<div class="form-group">
     	<div class="col-md-12">
			<?php echo $form->labelEx($model,'LOGIN_USUARIO'); ?>
			<?php echo $form->textField($model,'LOGIN_USUARIO',array("class"=>"form-control",'size'=>20,'maxlength'=>20)); ?>
			<?php echo $form->error($model,'LOGIN_USUARIO'); ?>
		</div>
	</div>

	<div class="form-group">
     	<div class="col-md-12">
			<?php echo $form->labelEx($model,'PASS_USUARIO'); ?>
			<?php echo $form->textField($model,'PASS_USUARIO',array("class"=>"form-control",'size'=>20,'maxlength'=>20)); ?>
			<?php echo $form->error($model,'PASS_USUARIO'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-offset-1 col-md-11">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array("class"=>"btn btn-primary")); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->