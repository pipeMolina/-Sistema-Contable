<?php
/* @var $this ComprobanteContableController */
/* @var $model ComprobanteContable */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'NUMERO_COMPROBANTE'); ?>
		<?php echo $form->textField($model,'NUMERO_COMPROBANTE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ID_TIPOCOMP'); ?>
		<?php echo $form->textField($model,'ID_TIPOCOMP'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RUT_EMPRESA'); ?>
		<?php echo $form->textField($model,'RUT_EMPRESA',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FECHA_COMPROBANTE'); ?>
		<?php echo $form->textField($model,'FECHA_COMPROBANTE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'GLOSA_COMPROBANTE'); ?>
		<?php echo $form->textField($model,'GLOSA_COMPROBANTE',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->