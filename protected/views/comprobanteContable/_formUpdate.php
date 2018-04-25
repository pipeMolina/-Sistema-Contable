<?php
/* @var $this ComprobanteContableController */
/* @var $model ComprobanteContable */
/* @var $form CActiveForm */
?>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comprobante-contable-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('class'=>'form-horizontal'),
)); ?>



	<?php echo $form->errorSummary($model,$modelLinea); ?>
<div div class="panel panel-primary">
<div class="panel-heading text-center"><h1 class="panel-title">Modificar Comprobante Contable <?php echo "#".$model->NUMERO_COMPROBANTE?></h1></div>
	<div class="panel-body">
	<legend><p class="note">Campos con <span class="required">*</span> son obligatorios.</p></legend>
		<div id="mensaje"></div>
		<div class="form-group">
			<input id="numero-comprobante" type="hidden" value="<?php echo $model->NUMERO_COMPROBANTE;?>" />
			<div class="col-lg-5"> 
				<?php echo $form->labelEx($model,'RUT_EMPRESA'); ?>
				<?php echo $form->dropDownList($model,'RUT_EMPRESA',CHtml::listData(Empresa::model()->findAll(), 'RUT_EMPRESA', 'GIRO_EMPRESA'), array("class"=>"form-control","id"=>"rutEmpresa")); ?>
				<?php //echo $form->textField($model,'RUT_EMPRESA',array("class"=>"form-control",'size'=>12,'maxlength'=>12)); ?>
				<?php echo $form->error($model,'RUT_EMPRESA'); ?>
			</div>
			<div class="col-lg-4"> 
				<?php echo $form->labelEx($model,'ID_TIPOCOMP'); ?>
				<?php echo $form->dropDownList($model,'ID_TIPOCOMP',CHtml::listData(TipoComprobante::model()->findAll(), 'ID_TIPOCOMP', 'NOMBRE_TIPOCOMP'), array("class"=>"form-control","id"=>"tipoComprobante")); ?>
				<?php //echo $form->textField($model,'ID_TIPOCOMP',array("class"=>"form-control")); ?>
				<?php echo $form->error($model,'ID_TIPOCOMP'); ?>
			</div>

			<div class="col-lg-3">
				<?php echo $form->labelEx($model,'FECHA_COMPROBANTE'); ?>	
				<?php $this->widget('zii.widgets.jui.CJuiDatePicker',array(
			    			'name'=>'FECHA_COMPROBANTE',
			    			'language'=>'es',
			    			'attribute' =>'FECHA',
							'value'	=>$model->FECHA_COMPROBANTE,
						    // additional javascript options for the date picker plugin
						    'options'=>array(
						        'showAnim'=>'fold',
						        'constrainInput'=>true,
											'currentText'=>'Now',
											'dateFormat'=>'yy-mm-dd',
						    ),
						    'htmlOptions'=>array(
						        'class'=>'form-control',
						        'id'=>'fecha_comp'
						    ),
						));
				?>
				<?php //echo $form->TextField($model,'FECHA_COMPROBANTE',array('class'=>'form-control','id'=>'datepicker'));?>
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
		<div>
			<div class="form-group">
				<div class="col-lg-4">
					<?php echo $form->labelEx($modelLinea[0],'CUENTA'); ?>
				</div>
				<div class="col-lg-3">
					<?php echo $form->labelEx($modelLinea[0],'DEBE'); ?>
				</div>
				<div class="col-lg-3">
					<?php echo $form->labelEx($modelLinea[0],'HABER'); ?>
				</div>
			</div>
			<?php 
			for($i=0;$i<count($modelLinea);$i++)
			{
			?>
			<div class="form-group">
				<div class="col-lg-4">
					<?php echo $form->dropDownList($modelLinea[$i],'CUENTA',CHtml::listData(Cuenta::model()->findAll(), 'CODIGO_CUENTA', 'DESCRIPCION_CUENTA'),array("class"=>"form-control","id"=>"validaDropDown".$i)); ?>
				</div>
				<div class="col-lg-3">
					<?php echo $form->textField($modelLinea[$i],"DEBE",array("class"=>"form-control","id"=>"validaDebe".$i))?>
				</div>
				<div class="col-lg-3">
					<?php echo $form->textField($modelLinea[$i],"HABER",array("class"=>"form-control","id"=>"validaHaber".$i));?>
				</div>
				<div class="col-lg-2">
					<button type="button" name="remove" id="<?php echo $i;?>" class="btn btn_remove btn-danger">x</button>
				</div>
			</div>
			
			<?php 
			}
			?>
			<table class="table" id="dynamic_field">
				<!--Aqui se agregan los campos de texto mediante JQuery-->
			</table>
		</div>

		<div class="form-group">
			 <div class="col-lg-3">
			     <button id="update" type="button" class="btn btn-primary">Actualizar Comprobante</button>
			 </div>
		</div>
	</div>
	</div>
<?php $this->endWidget(); ?>
<!--Muestra el plan de cuentas según el rut de la empresa-->

<div id="resultado"></div>


 <script type="text/javascript">  

 $(document).ready(function(){ 
 	  /*Variables Globales*/
 	  var i=0;
      var sumaDebe=0;
      var sumaHaber=0;
      var resultado=0;
      var valueDebe=0;
      var valueHaber=0;
     /*Accion para el boton borrar*/
      $(document).on("click", ".btn_remove", function(){  
           var button_id = $(this).attr("id");   
           $("#grupoLineas"+button_id+'').remove();
           i--;  
      });

      /*Accion para el boton guardar*/
      $("#update").click(function(){

           	var tipoComprobante = $("#tipoComprobante").val();
           	var x = i;
           	var z=i;
           	var activar=1;
           	if(tipoComprobante=="")
           	{
           		$("#mensaje").html("Debe elegir Tipo ");
				$("#mensaje").addClass("alert alert-danger");
           	}
           	while(x>0)
           	{
	           	var dropDown=$('#dropDown'+x+'').val();
	           	var valueDebe=$('#debe'+x+'').val();
	           	var valueHaber=$('#haber'+x+'').val();
	           	if(dropDown=="")
	           	{
	           		$('#validaDropDown'+x+'').html("Debe elegir Cuenta");
	           		activar=0;
	           	}
	           	else if(!/^([0-9])*$/.test(valueDebe))
	           	{
	           		$('#validaDebe'+x+'').html("Se permite solo números");
	           		activar=0;
	           	}else if(!/^([0-9])*$/.test(valueHaber))
	           	{
	           		$('#validaHaber'+x+'').html("Se permite solo números");
	           		activar=0;
	           	}else
	           	{
	           		$('#validaDropDown'+x+'').empty();
	           		$('#validaDebe'+x+'').empty();
	           		$('#validaHaber'+x+'').empty();
	           	}
	           	x--;
           	}
	 		//console.log(activar);
         	if(activar==1)
         	{
			   	while(z > 0)
			    {
	         		sumaDebe += parseInt($("#debe"+z+'').val());
			    	sumaHaber += parseInt($("#haber"+z+'').val());
			    	z--;
			    }	
		 		resultado = sumaDebe - sumaHaber;	
	 			console.log(resultado);
	 			console.log(sumaDebe);
	 			console.log(sumaHaber);

         	}
			if(resultado == 0 && activar==1)
			{
				var url = "<?php echo CController::createUrl('comprobanteContable/create'); ?>";
				var temp=$("#comprobante-contable-form").serialize();
	      		$.ajax(
			            {
			               	type:"POST",
			                url: url,
		               		data:$("#comprobante-contable-form").serialize(),
			               	success: function(data)
			               	{
				               	$("#mensaje").empty();
	           	   				$("#mensaje").removeClass("alert alert-dismissible alert-warning");
	           	   				$("#mensaje").html(data);
	      						/*Se eliminan las lineas contables*/
					      		while(i>0)
					      		{
					      			$("#grupoLineas"+i+'').remove(); 
					      			i--;
					      		}
			               	}
			            });				
			}
			else
			{
				sumaDebe=0;
				sumaHaber=0;
				$("#mensaje").html("Problemas con las lineas");
				$("#mensaje").addClass("alert alert-danger");
			}
    
      });
 }); 

 </script>
<script>
	function treePanel()
    {
		var url = "<?php echo CController::createUrl('ComprobanteContable/Tree'); ?>";
            $.ajax(
                {
                	type:"POST",
                	url: url,
               		data:"id="+$("#rutEmpresa").val(),
               		dataType:"html",
               		success: function(data)
               		{
               			$("#resultado").html(data);
               		}
               	});
    }
</script>

