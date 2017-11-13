<?php
/* @var $this TipoCuentaController */
/* @var $model TipoCuenta */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_TIPOCUENTA'); ?>
		<?php echo $form->textField($model,'ID_TIPOCUENTA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NOMBRE_TIPOCUENTA'); ?>
		<?php echo $form->textField($model,'NOMBRE_TIPOCUENTA',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->