<?php
/* @var $this TipoUsuarioController */
/* @var $model TipoUsuario */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_TIPOUSUARIO'); ?>
		<?php echo $form->textField($model,'ID_TIPOUSUARIO',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NOMBRE_TIPOUSUARIO'); ?>
		<?php echo $form->textField($model,'NOMBRE_TIPOUSUARIO',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->