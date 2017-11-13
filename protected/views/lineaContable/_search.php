<?php
/* @var $this LineaContableController */
/* @var $model LineaContable */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_LINEACONTABLE'); ?>
		<?php echo $form->textField($model,'ID_LINEACONTABLE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NUMERO_COMPROBANTE'); ?>
		<?php echo $form->textField($model,'NUMERO_COMPROBANTE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DEBE'); ?>
		<?php echo $form->textField($model,'DEBE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'HABER'); ?>
		<?php echo $form->textField($model,'HABER'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CUENTA'); ?>
		<?php echo $form->textField($model,'CUENTA',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->