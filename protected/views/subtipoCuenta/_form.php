<?php
/* @var $this SubtipoCuentaController */
/* @var $model SubtipoCuenta */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'subtipo-cuenta-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('class'=>'form-horizontal'),
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<legend><p class="note">Campos con <span class="required">*</span> son obligatorios.</p></legend>

	<div class="form-group">
     	<div class="col-md-6">
			<?php echo $form->labelEx($model,'ID_TIPOCUENTA'); ?>
			<?php echo $form->dropDownList($model,'ID_TIPOCUENTA',CHtml::listData(tipocuenta::model()->findAll(), 'ID_TIPOCUENTA', 'NOMBRE_TIPOCUENTA'), array("class"=>"form-control",'empty' => 'Elige tipo Cuenta')); ?>
			<!--<?php// echo $form->textField($model,'ID_TIPOCUENTA',array('class'=>'form-control')); ?>-->
			<?php echo $form->error($model,'ID_TIPOCUENTA'); ?>
		</div>
		<div class="col-md-6">
			<?php echo $form->labelEx($model,'ID_SUBTIPOCUENTA'); ?>
			<?php echo $form->textField($model,'ID_SUBTIPOCUENTA',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'ID_SUBTIPOCUENTA'); ?>
		</div>
	</div>
    <!--<div class="form-group">
     	<div class="col-md-12">
			<?php //echo $form->labelEx($model,'ID_SUBTIPOCUENTA'); ?>
			<?php //echo $form->textField($model,'ID_SUBTIPOCUENTA',array('class'=>'form-control')); ?>
			<?php //echo $form->error($model,'ID_SUBTIPOCUENTA'); ?>
		</div>
	</div>-->

	<div class="form-group">
     	<div class="col-md-12">
			<?php echo $form->labelEx($model,'NOMBRE_SUBTIPOCUENTA'); ?>
			<?php echo $form->textField($model,'NOMBRE_SUBTIPOCUENTA',array('class'=>'form-control','size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'NOMBRE_SUBTIPOCUENTA'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-offset-1 col-md-11">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array("class"=>"btn btn-primary")); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->