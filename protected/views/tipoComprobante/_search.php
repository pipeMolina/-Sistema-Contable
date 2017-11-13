<?php
/* @var $this TipoComprobanteController */
/* @var $model TipoComprobante */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_TIPOCOMP'); ?>
		<?php echo $form->textField($model,'ID_TIPOCOMP'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NOMBRE_TIPOCOMP'); ?>
		<?php echo $form->textField($model,'NOMBRE_TIPOCOMP',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->