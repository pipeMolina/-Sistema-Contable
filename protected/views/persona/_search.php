<?php
/* @var $this PersonaController */
/* @var $model Persona */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'RUT_PERSONA'); ?>
		<?php echo $form->textField($model,'RUT_PERSONA',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NOMBRE_PERSONA'); ?>
		<?php echo $form->textField($model,'NOMBRE_PERSONA',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'APELLIDO_PERSONA'); ?>
		<?php echo $form->textField($model,'APELLIDO_PERSONA',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TELEFONO_PERSONA'); ?>
		<?php echo $form->textField($model,'TELEFONO_PERSONA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CORREO_PERSONA'); ?>
		<?php echo $form->textField($model,'CORREO_PERSONA',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->