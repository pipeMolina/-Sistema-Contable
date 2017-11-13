<?php
/* @var $this CuentaController */
/* @var $model Cuenta */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_CUENTA'); ?>
		<?php echo $form->textField($model,'ID_CUENTA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ID_TIPOCUENTA'); ?>
		<?php echo $form->textField($model,'ID_TIPOCUENTA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ID_PLANCUENTA'); ?>
		<?php echo $form->textField($model,'ID_PLANCUENTA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ID_SUBTIPOCUENTA'); ?>
		<?php echo $form->textField($model,'ID_SUBTIPOCUENTA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DESCRIPCION_CUENTA'); ?>
		<?php echo $form->textField($model,'DESCRIPCION_CUENTA',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->