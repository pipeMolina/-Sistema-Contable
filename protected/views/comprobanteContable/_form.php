<?php
/* @var $this ComprobanteContableController */
/* @var $model ComprobanteContable */
/* @var $form CActiveForm */
?>
<script>
$(function(){
$("#btn-info").click(function(){
        $("ol").append("<li>Appended item</li>");
    });
});
</script>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comprobante-contable-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model,$lineasContables); ?>


	<div class="form-group">
		<div class="col-lg-4"> 
			<?php echo $form->labelEx($model,'RUT_EMPRESA'); ?>
			<?php echo $form->dropDownList($model,'RUT_EMPRESA',CHtml::listData(Empresa::model()->findAll(), 'RUT_EMPRESA', 'GIRO_EMPRESA'), array("class"=>"form-control","empty" => "Elige Empresa")); ?>
			<?php //echo $form->textField($model,'RUT_EMPRESA',array("class"=>"form-control",'size'=>12,'maxlength'=>12)); ?>
			<?php echo $form->error($model,'RUT_EMPRESA'); ?>
		</div>
		<div class="col-lg-4"> 
			<?php echo $form->labelEx($model,'ID_TIPOCOMP'); ?>
			<?php echo $form->dropDownList($model,'ID_TIPOCOMP',CHtml::listData(TipoComprobante::model()->findAll(), 'ID_TIPOCOMP', 'NOMBRE_TIPOCOMP'), array("class"=>"form-control","empty" => "Elige Tipo Comprobante")); ?>
			<?php //echo $form->textField($model,'ID_TIPOCOMP',array("class"=>"form-control")); ?>
			<?php echo $form->error($model,'ID_TIPOCOMP'); ?>
		</div>
	

		<div class="col-lg-4">
			<?php echo $form->labelEx($model,'FECHA_COMPROBANTE'); ?>	
			<?php echo $form->textField($model,'FECHA_COMPROBANTE',array('id'=>'datetimepicker1')); ?>
			<?php echo $form->error($model,'FECHA_COMPROBANTE'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-12">
			<?php echo $form->labelEx($model,'GLOSA_COMPROBANTE'); ?>
			<?php echo $form->textField($model,'GLOSA_COMPROBANTE',array("class"=>"form-control",'size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'GLOSA_COMPROBANTE'); ?>
		</div>
	</div>

	<!--<div class="form-group">
		<div class="col-lg-offset-1 col-md-11">
				<?php //echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class' =>'btn btn-primary'));; ?>
		</div>	
	</div>-->
 <?php foreach ($lineasContables as $i => $modelDetail) : ?>
        <div class="row linea-detail linea-detail-<?= $i ?>">
            <div class="col-lg-10">
                <?php //echo CHtml::activeHiddenField($modelDetail, "NUMERO_COMPROBANTE") ?>
                <?php //echo CHtml::activeHiddenField($modelDetail, "CUENTA", array('class' => 'update-type')) ?>
                <?php //echo $form->textField($modelDetail, "[$i]CUENTA") ?>
            </div>
            <div class="col-md-2">
                <?php echo CHtml::button('x', array('class' => 'delete-button btn btn-danger', 'data-target' => "linea-detail-$i")) ?>
            </div>
        </div>
    <?php endforeach; ?>

  <div class="form-group">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Update', array('class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary')) ?>
        <?php echo CHtml::submitButton('Agregar Linea', array('name' => 'addRow', 'class' => 'btn btn-info')) ?>
    </div>
<?php $this->endWidget(); ?>

</div><!-- form -->
