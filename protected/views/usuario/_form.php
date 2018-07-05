<?php
/* @var $this UsuarioController */
/* @var $model Usuario */
/* @var $form CActiveForm */
?>
<!--<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/validar.js"></script>-->
<div class="form" method="post">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('class'=>'form-horizontal'),

)); ?>

	<?php echo $form->errorSummary($model,$modelPersona); ?>

	<div id="campos"></div>

	<legend><p class="note">Campos con <span class="required">*</span> son obligatorios.</p></legend>
    
	<div class="form-group">
		<div class="col-lg-4">
			<?php echo $form->labelEx($model,'RUT_PERSONA'); ?>
			<?php echo $form->textField($model,'RUT_PERSONA',array("id"=>"rut","onblur"=>"validarRut();","class"=>"form-control",'size'=>12,'maxlength'=>12)); ?>
			<?php echo $form->error($model,'RUT_PERSONA'); ?>
			<div id="error_rut"></div>
		</div>
		<div class="col-lg-4">
			<?php echo $form->labelEx($modelPersona,'NOMBRE_PERSONA'); ?>
			<?php echo $form->textField($modelPersona,'NOMBRE_PERSONA',array("id"=>"nombre","onkeypress"=>"return soloLetras(event)","class"=>"form-control",'size'=>20,'maxlength'=>20)); ?>
			<?php echo $form->error($modelPersona,'NOMBRE_PERSONA'); ?>
		</div>
		<div class="col-lg-4">
			<?php echo $form->labelEx($modelPersona,'APELLIDO_PERSONA'); ?>
			<?php echo $form->textField($modelPersona,'APELLIDO_PERSONA',array("id"=>"apellidos","onkeypress"=>"return soloLetras(event)","class"=>"form-control",'size'=>20,'maxlength'=>20)); ?>
			<?php echo $form->error($modelPersona,'APELLIDO_PERSONA'); ?>
		</div>
	</div>
    <div class="form-group">
		<div class="col-lg-6">
			<?php echo $form->labelEx($modelPersona,'TELEFONO_PERSONA'); ?>
			<?php echo $form->textField($modelPersona,'TELEFONO_PERSONA',array("id"=>"telefono","class"=>"form-control")); ?>
			<?php echo $form->error($modelPersona,'TELEFONO_PERSONA'); ?>
		</div>
		<div class="col-lg-6">
			<?php echo $form->labelEx($modelPersona,'CORREO_PERSONA'); ?>
			<?php echo $form->textField($modelPersona,'CORREO_PERSONA',array("id"=>"correo","onblur"=>"validarCorreo();","class"=>"form-control")); ?>
			<?php echo $form->error($modelPersona,'CORREO_PERSONA'); ?>
			<div id="error_correo"></div>
		</div>

	</div>
	
	<div class="form-group">
		<div class="col-lg-6">
			<?php echo $form->labelEx($model,'ID_TIPOUSUARIO'); ?>
			<?php echo $form->dropDownList($model,'ID_TIPOUSUARIO',CHtml::listData(TipoUsuario::model()->findAll(), 'ID_TIPOUSUARIO', 'NOMBRE_TIPOUSUARIO'), array("id"=>"tipoUsuario","class"=>"form-control","empty" => "Elige Tipo")); ?>
			<!--<?php //echo $form->textField($model,'ID_TIPOUSUARIO',array("class"=>"form-control")); ?>-->
			<?php echo $form->error($model,'ID_TIPOUSUARIO'); ?>
		</div>
	</div>

	<div class="form-group">
     	<div class="col-lg-12">
			<?php echo $form->labelEx($model,'LOGIN_USUARIO'); ?>
			<?php echo $form->textField($model,'LOGIN_USUARIO',array("id"=>"usuario","class"=>"form-control",'size'=>20,'maxlength'=>20)); ?>
			<?php echo $form->error($model,'LOGIN_USUARIO'); ?>
		</div>
	</div>

	<div class="form-group">
     	<div class="col-lg-12">
			<?php echo $form->labelEx($model,'PASS_USUARIO'); ?>
			<?php echo $form->textField($model,'PASS_USUARIO',array("id"=>"clave","class"=>"form-control",'size'=>20,'maxlength'=>20)); ?>
			<?php echo $form->error($model,'PASS_USUARIO'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-12">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array("class"=>"btn btn-primary","onclick"=>"return validarForm();")); ?>
		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->