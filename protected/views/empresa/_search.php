<?php
/* @var $this EmpresaController */
/* @var $model Empresa */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ID_EMPRESA'); ?>
		<?php echo $form->textField($model,'ID_EMPRESA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RUT_EMPRESA'); ?>
		<?php echo $form->textField($model,'RUT_EMPRESA',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ID_CIUDAD'); ?>
		<?php echo $form->textField($model,'ID_CIUDAD'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ID_PLANCUENTA'); ?>
		<?php echo $form->textField($model,'ID_PLANCUENTA'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RAZONSOCIAL_EMPRESA'); ?>
		<?php echo $form->textField($model,'RAZONSOCIAL_EMPRESA',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'GIRO_EMPRESA'); ?>
		<?php echo $form->textField($model,'GIRO_EMPRESA',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TELEFONO_EMPRESA'); ?>
		<?php echo $form->textField($model,'TELEFONO_EMPRESA',array('size'=>15,'maxlength'=>15)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CORREO'); ?>
		<?php echo $form->textField($model,'CORREO',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->