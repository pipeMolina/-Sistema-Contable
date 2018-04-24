<?php
/* @var $this EmpresaController */
/* @var $model Empresa */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'empresa-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
	'htmlOptions' => array('class'=>'form-horizontal'),

)); ?>


	<?php echo $form->errorSummary($model); ?>

    <legend><p class="note">Campos con <span class="required">*</span> son obligatorios.</p></legend>
    <div class="form-group">

		<div class="col-md-6 ">
			<?php echo $form->labelEx($model,'RUT_EMPRESA'); ?>
			<?php echo $form->textField($model,'RUT_EMPRESA',array("class"=>"form-control",'size'=>12,'maxlength'=>12,"placeholder"=>"12345678-9")); ?>
			<?php echo $form->error($model,'RUT_EMPRESA'); ?>
		</div>
	</div>
	<!--<div class="form-group">
	    <div class="col-md-12">
			<?php //echo $form->labelEx($model,'RUT_EMPRESA'); ?>
			<?php// echo $form->textField($model,'RUT_EMPRESA',array("class"=>"form-control",'size'=>12,'maxlength'=>12)); ?>
			<?php //echo $form->error($model,'RUT_EMPRESA'); ?>
		</div>
    </div>-->
	<div class="form-group">
		<div class="col-md-12">
			<?php echo $form->labelEx($model,'RAZONSOCIAL_EMPRESA'); ?>
			<?php echo $form->textField($model,'RAZONSOCIAL_EMPRESA', array('size'=>50,'maxlength'=>50,"class"=>"form-control")); ?>
			<?php echo $form->error($model,'RAZONSOCIAL_EMPRESA'); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-12">
			<?php echo $form->labelEx($model,'GIRO_EMPRESA'); ?>
			<?php echo $form->textField($model,'GIRO_EMPRESA',array("class"=>"form-control",'size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'GIRO_EMPRESA'); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-6">
			<?php echo $form->labelEx($model,'ID_PLANCUENTA'); ?>
			<?php echo $form->dropDownList($model,'ID_PLANCUENTA',CHtml::listData(plancuenta::model()->findAll(), 'ID_PLANCUENTA', 'DESCRIPCION_PLANCUENTA'), array("empty"=>"Primero debe crear Plan de Cuentas","disabled" => "disabled","class"=>"form-control")); ?>
			<!--<?php //echo $form->textField($model,'ID_PLANCUENTA',array("class"=>"form-control","readonly"=>"true","placeholder"=>"Debe crear Plan de Cuentas")); ?>-->
			<?php echo $form->error($model,'ID_PLANCUENTA'); ?>
		</div>

		<div class="col-md-6">
			<?php echo $form->labelEx($model,'ID_CIUDAD'); ?>
			<?php echo $form->dropDownList($model,'ID_CIUDAD',CHtml::listData(ciudad::model()->findAll(), 'ID_CIUDAD', 'NOMBRE_CIUDAD'), array("class"=>"form-control","empty" => "Elige Ciudad")); ?>
			<!--<?php //echo $form->textField($model,'ID_CIUDAD',array("class"=>"form-control")); ?>-->
			<?php echo $form->error($model,'ID_CIUDAD'); ?>
		</div>
	</div>
	<!--<div class="form-group">
		<div class="col-md-12">
			<?php echo $form->labelEx($model,'ID_CIUDAD'); ?>
			<?php echo $form->textField($model,'ID_CIUDAD',array("class"=>"form-control")); ?>
			<?php echo $form->error($model,'ID_CIUDAD'); ?>
		</div>
	</div>-->
	<div class="form-group">
		<div class="col-md-6">
			<?php echo $form->labelEx($model,'TELEFONO_EMPRESA'); ?>
			<?php echo $form->textField($model,'TELEFONO_EMPRESA',array("class"=>"form-control",'size'=>15,'maxlength'=>15)); ?>
			<?php echo $form->error($model,'TELEFONO_EMPRESA'); ?>
		</div>

		<div class="col-md-6">
			<?php echo $form->labelEx($model,'CORREO'); ?>
			<?php echo $form->textField($model,'CORREO',array("class"=>"form-control",'size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'CORREO'); ?>
		</div>
	</div>
	<!--<div class="form-group">
		<div class="col-md-12">
			<div class="input-group">
				<?php echo $form->labelEx($model,'CORREO'); ?>
 		 		<input type="text" name="correo" class="form-control" placeholder="Ingrese Correo" aria-describedby="basic-addon2">
  				<span class="input-group-addon" id="basic-addon2">@example.com</span>
			</div>
		</div>
	</div>-->

	<!--<div class="row">
		<?php //echo $form->labelEx($model,'CORREO'); ?>
		<?php //echo $form->textField($model,'CORREO',array('size'=>50,'maxlength'=>50)); ?>
		<?php //echo $form->error($model,'CORREO'); ?>
	</div>-->

	<div class="form-group">
		<div class="col-md-offset-1 col-md-11">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array("class"=>"btn btn-primary")); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->