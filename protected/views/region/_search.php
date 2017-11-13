<?php
/* @var $this RegionController */
/* @var $model Region */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_REGION'); ?>
		<?php echo $form->textField($model,'ID_REGION'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NOMBRE_REGION'); ?>
		<?php echo $form->textField($model,'NOMBRE_REGION',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->