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
	<div div class="panel panel-primary">
	<div class="panel-heading text-center"><h1 class="panel-title">Modificar Cuenta</h1></div>
		<div class="panel-body">

	<legend><p class="note">Campos con <span class="required">*</span> son obligatorios.</p></legend>
   
	<div class="form-group" method="post" id="formulario">
		<div class="col-md-4">
			<?php echo $form->labelEx($model,'ID_PLANCUENTA'); ?>
			<?php  	
				$id=1;
				$criteria=new CDbCriteria();
				//$criteria->select='ID_PLANCUENTA,DESCRIPCION_PLANCUENTA';
				$criteria->addCondition('ID_PLANCUENTA>:id');
				$criteria->params=array(':id'=>$id);
				echo $form->dropDownList($model,'ID_PLANCUENTA',CHtml::listData(plancuenta::model()->findAll($criteria), 'ID_PLANCUENTA', 'DESCRIPCION_PLANCUENTA'), array("class"=>"form-control","id"=>"idplan",'empty'=>'Seleccione Empresa',"onchange"=>"treePanel()"));
				
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
				 	'id'=> 'tipoCUenta',
				 	'ajax' => array(
								'type'=>'POST',
								'url'=>CController::createUrl('cuenta/selectSubtipos'),
								'update'=>'#'.CHtml::activeId($model,'ID_SUBTIPOCUENTA'),
							)
				 	)); ?>
			<!--<?php //echo $form->textField($model,'ID_TIPOCUENTA',array("class"=>"form-control")); ?>-->
			<?php echo $form->error($model,'ID_TIPOCUENTA'); ?>
		</div>
		<div class="col-md-4">
			<?php echo $form->labelEx($model,'ID_SUBTIPOCUENTA'); ?>
			<?php echo  empty($model->ID_SUBTIPOCUENTA) ? $form->dropDownList($model,'ID_SUBTIPOCUENTA',array(),
				array(
					'class'=>'form-control',
					"ajax"=>array(
							'type' =>'POST' , 
							'url'=>CController::createUrl('cuenta/setCodigo'),
							'update'=>'#codigo',
							)
				)
					
			) : $form->dropDownList($model,'ID_SUBTIPOCUENTA',CHtml::listData(SubtipoCuenta::model()->findAll(), 'ID_SUBTIPOCUENTA', 'NOMBRE_SUBTIPOCUENTA'),
				array(
					'class'=>'form-control',
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
	<div class="form-group">
		
		<div class="col-md-6">
			<?php echo $form->labelEx($model,'CODIGO_CUENTA'); ?>
			<div id='codigo'>
				<?php echo $form->textField($model,'CODIGO_CUENTA',array("class"=>"form-control")); ?>
			</div>
			<?php echo $form->error($model,'CODIGO_CUENTA'); ?>
			
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
 </div>
</div>
<div id="resultado"></div>

   
</div><!-- form -->

<?php $this->endWidget(); ?>
<script>
	function treePanel()
    {
		var url = "<?php echo CController::createUrl('cuenta/Tree'); ?>";
            $.ajax(
                {
                	type:"POST",
                	url: url,
               		data:"id="+$("#idplan").val(),
               		dataType:"html",
               		success: function(data)
               		{
               			$("#resultado").html(data);
               		}
               	});
    }
</script>




