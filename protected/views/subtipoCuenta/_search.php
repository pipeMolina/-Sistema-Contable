<?php
/* @var $this SubtipoCuentaController */
/* @var $model SubtipoCuenta */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_SUBTIPOCUENTA'); ?>
		<?php echo $form->textField($model,'ID_SUBTIPOCUENTA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ID_TIPOCUENTA'); ?>
		<?php echo $form->textField($model,'ID_TIPOCUENTA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NOMBRE_SUBTIPOCUENTA'); ?>
		<?php echo $form->textField($model,'NOMBRE_SUBTIPOCUENTA',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->