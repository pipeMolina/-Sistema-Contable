<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
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
		<?php echo $form->label($model,'ID_TIPOUSUARIO'); ?>
		<?php echo $form->textField($model,'ID_TIPOUSUARIO'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LOGIN_USUARIO'); ?>
		<?php echo $form->textField($model,'LOGIN_USUARIO',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PASS_USUARIO'); ?>
		<?php echo $form->textField($model,'PASS_USUARIO',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->