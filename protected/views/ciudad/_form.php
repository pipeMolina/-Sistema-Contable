<?php
/* @var $this CiudadController */
/* @var $model Ciudad */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ciudad-form',
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
			<?php echo $form->labelEx($model,'ID_CIUDAD'); ?>
			<?php echo $form->textField($model,'ID_CIUDAD',array("class"=>"form-control")); ?>
			<?php echo $form->error($model,'ID_CIUDAD'); ?>
		</div>
		<div class="col-md-6">
			<?php echo $form->labelEx($model,'ID_REGION'); ?>
			<?php echo $form->dropDownList($model,'ID_REGION',CHtml::listData(Region::model()->findAll(), 'ID_REGION', 'NOMBRE_REGION'), array("class"=>"form-control","empty" => "Elige Region")); ?>
			<!--<?php //echo $form->textField($model,'ID_REGION',array("class"=>"form-control")); ?>-->
			<?php echo $form->error($model,'ID_REGION'); ?>
		</div>
	</div>

	<div class="form-group">
     	<div class="col-md-12">
			<?php echo $form->labelEx($model,'NOMBRE_CIUDAD'); ?>
			<?php echo $form->textField($model,'NOMBRE_CIUDAD',array("class"=>"form-control",'size'=>25,'maxlength'=>25)); ?>
			<?php echo $form->error($model,'NOMBRE_CIUDAD'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-offset-1 col-md-11">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array("class"=>"btn btn-primary")); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->