<?php
/* @var $this CuentaController */
/* @var $model Cuenta */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cuenta-form',
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
		<div class="col-md-4">
			<?php echo $form->labelEx($model,'ID_PLANCUENTA'); ?>
			<?php  	
				echo $form->dropDownList($model,'ID_PLANCUENTA',CHtml::listData(plancuenta::model()->findAll(), 'ID_PLANCUENTA', 'DESCRIPCION_PLANCUENTA'), array("class"=>"form-control"));
				
			?>
			<!--<?php //echo $form->textField($model,'ID_PLANCUENTA',array("class"=>"form-control","disabled"=>"")); ?>-->
			<?php echo $form->error($model,'ID_PLANCUENTA'); ?>
		</div>
		<div class="col-md-4">
			<?php echo $form->labelEx($model,'ID_TIPOCUENTA'); ?>
			<?php echo $form->dropDownList($model,'ID_TIPOCUENTA',CHtml::listData(tipocuenta::model()->findAll(), 'ID_TIPOCUENTA', 'NOMBRE_TIPOCUENTA'),
				 array(
				 	"class"=>"form-control",
				 	'empty' => 'Elige Tipo Cuenta',
				 	'ajax' => array(
								'type'=>'POST',
								'url'=>CController::createUrl('cuenta/selectSubtipos'),
								'update'=>'#'.CHtml::activeId(cuenta::model(),'ID_SUBTIPOCUENTA'),
							)
				 	)); ?>
			<!--<?php //echo $form->textField($model,'ID_TIPOCUENTA',array("class"=>"form-control")); ?>-->
			<?php echo $form->error($model,'ID_TIPOCUENTA'); ?>
		</div>
		<div class="col-md-4">
			<?php echo $form->labelEx($model,'ID_SUBTIPOCUENTA'); ?>
			<?php echo $form->dropDownList($model,'ID_SUBTIPOCUENTA', array(),
					array("class"=>"form-control",
						"ajax"=>array(
							'type' =>'POST' , 
							'url'=>CController::createUrl('cuenta/setCodigo'),
							'update'=>'#codigo',
							)
						)
			);?>
			<!--<?php //echo $form->textField($model,'ID_SUBTIPOCUENTA',array("class"=>"form-control")); ?>-->
			<?php echo $form->error($model,'ID_SUBTIPOCUENTA'); ?>
		</div>
	</div>
    <!--<div class="form-group">
		<div class="col-md-12">
			<?php //echo $form->labelEx($model,'ID_TIPOCUENTA'); ?>
			<?php //echo $form->textField($model,'ID_TIPOCUENTA',array("class"=>"form-control")); ?>
			<?php //echo $form->error($model,'ID_TIPOCUENTA'); ?>
		</div>
	</div>-->
	<!--<div class="form-group">
		<div class="col-md-6">
			<?php echo $form->labelEx($model,'ID_SUBTIPOCUENTA'); ?>
			<?php echo $form->dropDownList($model,'ID_SUBTIPOCUENTA', array())?>
			<?php //echo $form->textField($model,'ID_SUBTIPOCUENTA',array("class"=>"form-control")); ?>
			<?php echo $form->error($model,'ID_SUBTIPOCUENTA'); ?>
		</div>-->
	<div class="form-group">
		
		<div class="col-md-6">
			<?php echo $form->labelEx($model,'ID_CUENTA'); ?>
			<div id='codigo'>
				<?php echo $form->textField($model,'ID_CUENTA',array("class"=>"form-control")); ?>
			</div>
			<?php echo $form->error($model,'ID_CUENTA'); ?>
			
		</div>	

		<div class="col-md-6">
			<?php echo Chtml::button('Asignar Codigo',array("id"=>"btn1"));?>
		</div>
		
	</div>
    <!--<div class="form-group">
     	<div class="col-md-12">
		<?php //echo $form->labelEx($model,'ID_CUENTA'); ?>
		<?php //echo $form->textField($model,'ID_CUENTA',array("class"=>"form-control")); ?>
		<?php //echo $form->error($model,'ID_CUENTA'); ?>
		</div>
	</div>	-->

	<div class="form-group">
		<div class="col-md-12">
			<?php echo $form->labelEx($model,'DESCRIPCION_CUENTA'); ?>
			<?php echo $form->textField($model,'DESCRIPCION_CUENTA',array("class"=>"form-control",'size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'DESCRIPCION_CUENTA'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-offset-1 col-md-11">
			<?php //echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array("class"=>"btn btn-primary")); ?>
			<?php echo CHtml::submitButton('Crear cuenta',array("class"=>"btn btn-primary", "id"=>"otro","name"=>"otro")); ?>

		</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
	
	$(document).ready(function(){
		$("#btn1").click(function(){
        $("#textCodigo").val("Hola Mundo");
    });
	});
</script>
<!--<select name="selectcito" id="selectcito">
        <option value="NO">No</option>
        <option value="SI">Sí</option>
</select>

<input type="text" name="inputcito" id="inputcito" />

<script type="text/javascript">
// Esperar a que se cargue todo el documento
$(document).ready(function(){
        // Al cambiar la opción del SELECT
        $('#selectcito').change(function(){
                // Fijarse el valor de la opción seleccionada y activar/desactivar el input
                val = $(this).find('option:selected').val();
                if(val == 'NO'){
                        // Desactivo el input
                        $('#inputcito').attr('readonly', 'readonly'); 
                        // READONLY Si no querés que se modifique pero que se envíe el valor al hacer SUBMIT
                        // Sino tendrías que hacer $('#inputcito').attr('disabled', 'disabled'); 
                } else {
                        $('#inputcito').removeAttr('readonly');  // O "disabled"
                }
        });
});
</script>-->