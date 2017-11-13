<?php
/* @var $this PlanCuentaController */
/* @var $model PlanCuenta */
/* @var $form CActiveForm */
?>

<div class="form-group">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'plan-cuenta-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('class'=>'form-horizontal'),
)); ?>

	<?php echo CHtml::errorSummary(array($model)); ?>

	<legend><p class="note">Campos con <span class="required">*</span> son obligatorios.</p></legend>
    <div class="form-group">
     	<!--<div class="col-md-6">
			<?php echo $form->labelEx($model,'ID_PLANCUENTA'); ?>
			<?php echo $form->textField($model,'ID_PLANCUENTA',array("class"=>"form-control","id"=>"test")); ?>
			<?php echo $form->error($model,'ID_PLANCUENTA'); ?>
		</div>-->

		<div class="col-md-6">
			<?php echo $form->labelEx($model,'DESCRIPCION_PLANCUENTA'); ?>
			<?php echo $form->textField($model,'DESCRIPCION_PLANCUENTA',array("class"=>"form-control",'size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'DESCRIPCION_PLANCUENTA'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-md-offset-1 col-md-11">
			<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array("class"=>"btn btn-primary","onclick"=>"disable()")); ?>
		</div>
	</div>
	<!--<?php
		/*echo CHtml::link('Crear Cuenta', "",
	    array(
	     'style'=>'cursor: pointer; text-decoration: underline;',
	     'onclick'=>"{addCuenta(); $('#dialogcuenta').dialog('open');}"
	     ));
	  // Link para abrir el JuiDialog y crear un autor /
	  $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
		   'id'=>'dialogcuenta',
		   'options'=>array(
		     'title'=>'Crear Cuenta',
		     'autoOpen'=>false,
		     'modal'=>true,
		     ),
		   ));
		  echo '<div class="dialog" > </div>';
	  $this->endWidget();*/
	   ?>-->

<?php $this->endWidget(); ?>



</div><!-- form -->
<!--<script>
	function addCuenta()
	{
	  <?php 
	 /* echo CHtml::ajax(array(
	    'url'=>array('cuenta/create'),
	    'data'=> "js:$(this).serialize()",
	    'type'=>'post',
	    'dataType'=>'json',
	    'success'=>"function(data)
	    {
	      if (data.status == 'failure')
	      {
	        $('#dialogcuenta div.dialog').html(data.div);
	        $('#dialogCuenta div.dialog form').submit(addCuenta);
	      }
	      else
	      {
	        $('#dialogcuenta div.dialog').html(data.div);
	        setTimeout(\"$('#dialogcuenta').dialog('close') \",1000);
	        ".
	        CHtml::ajax(array(
	          'url'=>array('libros/updateAutores'),
	          'data'=> "js:$(this).serialize()",
	          'type'=>'post',
	          'dataType'=>'json',
	          'success'=>"function(data)
	          {
	            $('#nueve').html(data.div);
	          }",
	          ))
	        ."
	      }
	    }",
	    ))*/
	  ?>;
	  return false; 
	}
</script>-->