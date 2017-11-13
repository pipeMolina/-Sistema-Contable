<?php
/* @var $this PlanCuentaController */
/* @var $model PlanCuenta */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_PLANCUENTA'); ?>
		<?php echo $form->textField($model,'ID_PLANCUENTA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DESCRIPCION_PLANCUENTA'); ?>
		<?php echo $form->textField($model,'DESCRIPCION_PLANCUENTA',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->