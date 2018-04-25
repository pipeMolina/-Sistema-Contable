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
					<?php echo $form->dropDownList($modelLinea[$i],'CUENTA['.$i.']',CHtml::listData(Cuenta::model()->findAll(), 'CODIGO_CUENTA', 'DESCRIPCION_CUENTA'),array("class"=>"form-control","id"=>"validaDropDown".$i)); ?>
				</div>
				<div class="col-lg-3">
					<?php echo $form->textField($modelLinea[$i],'DEBE['.$i.']',array("class"=>"form-control","id"=>"validaDebe".$i))?>
				</div>
				<div class="col-lg-3">
					<?php echo $form->textField($modelLinea[$i],'HABER['.$i.']',array("class"=>"form-control","id"=>"validaHaber".$i));?>
				</div>
				<div class="col-lg-2">
					<button type="button" name="remove" id="<?php echo $i;?>" class="btn btn_remove btn-danger">x</button>
				</div>
			</div>
			<?php 
			}
			?>
			<input id="hiddenI" type="hidden" name="hiddenI" value=<?php echo count($modelLinea);?>></input>
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
      var sumaDebe=0;
      var sumaHaber=0;
      var resultado=0;
      var valueDebe=0;
      var valueHaber=0;
      var modelLinea=[];
      /*Accion para el boton agregar*/
      $("#add").click(function(){ 
      	   var rutEmpresa=$("#rutEmpresa").val();
           if(i>0)
           {
           	   valueDebe=$("#debe"+i+'').val();
           	   valueHaber=$("#haber"+i+'').val();
           	   if($("#dropDown"+i+'').val() == "")
           	   {
           	   		$("#validaDropDown"+i+'').html("Debe elegir cuenta");
		    		$("#validaDropDown"+i+'').addClass("alert-danger");
           	   }
		       else if (!/^([0-9])*$/.test(valueDebe))
		    	{
		    		$("#validaDebe"+i+'').html("Se permite solo numeros");
		    		$("#validaDebe"+i+'').addClass("alert-danger");
		    	}	 
		    	 else if(!/^([0-9])*$/.test(valueHaber))
		    	{
		    		$("#validaHaber"+i+'').html("Se permite solo numeros");
		    		$("#validaHaber"+i+'').addClass("alert-danger");
		    	} 
		    	else
		    	{
		    		$("#mensaje").empty();
           	   		$("#mensaje").removeClass("alert alert-dismissible alert-warning");

           	   		$("#validaDropDown"+i+'').empty();
		    		$("#validaDropDown"+i+'').removeClass("alert-danger");
           	   		
           	   		$("#validaDebe"+i+'').empty();
           	   		$("#validaDebe"+i+'').removeClass("alert-danger");
           	   		
           	   		$("#validaHaber"+i+'').empty();
           	   		$("#validaHaber"+i+'').removeClass("alert-danger");
           	   		i++;

           	   	   var lineas=$('<div class="form-group" id="grupoLineas'+i+'"></div>');
		      	   var divDropDownList=$('<div class=\"col-lg-4\" id="row'+i+'"></div>');
		      	   var divDebe=$('<div class=\"col-lg-3\" id="row'+i+'"></div>');
		      	   var divHaber=$('<div class=\"col-lg-3\" id="row'+i+'"></div>');
		      	   var divEliminar=$('<div class=\"col-lg-2\" id="row'+i+'"></div>');
		           //alert('row'+i);
		           var dropDown = $("<select id='dropDown"+i+"' name=\"Cuenta[]\" class=\"form-control\"/><div id='validaDropDown"+i+"'></div>");
		           var debe=$("<input type='text' id='debe"+i+"' name=Debe[] value=0 class='form-control'><div id='validaDebe"+i+"'></div>");
		           var haber=$("<input type='text' id='haber"+i+"' name=Haber[] value=0 class='form-control'><div id='validaHaber"+i+"'></div>");
		           var eliminar=$('<button type="button" name="remove" id="'+i+'" class="btn btn_remove btn-danger">x</button>');
		           divDropDownList.append(dropDown);
		           divDebe.append(debe);
		           divHaber.append(haber);
		           divEliminar.append(eliminar);
		           lineas.append(divDropDownList);
		           lineas.append(divDebe);
		           lineas.append(divHaber);
		           lineas.append(divEliminar);

					$("#dynamic_field").append(lineas);
					var url = "<?php echo CController::createUrl('ComprobanteContable/CargaCuentasJs'); ?>";
			        $.ajax(
			            {
			               	type:"POST",
			                url: url,
			               	data:"id="+$("#rutEmpresa").val(),
			               	dataType:"html",
			               	success: function(data)
			               	{
			               		$('#dropDown'+i+'').html(data);
			               	}
			            });
		    	}
           }	
      
    		else 
    		{

           	  /*Agregando filas para el primer caso*/
           	   $("#mensaje").empty();
           	   $("#mensaje").removeClass("alert alert-dismissible alert-warning");
			   i++;
	      	   var lineas=$('<div class="form-group" id="grupoLineas'+i+'"></div>');
		      	   var divDropDownList=$('<div class=\"col-lg-4\" id="row'+i+'"></div>');
		      	   var divDebe=$('<div class=\"col-lg-3\" id="row'+i+'"></div>');
		      	   var divHaber=$('<div class=\"col-lg-3\" id="row'+i+'"></div>');
		      	   var divEliminar=$('<div class=\"col-lg-2\" id="row'+i+'"></div>');
		           //alert('row'+i);
		           var dropDown = $("<select id='dropDown"+i+"' name=\"Cuenta[]\" class=\"form-control\"/><div id='validaDropDown"+i+"'></div>");
		           var debe=$("<input type='text' id='debe"+i+"' name=Debe[] value=0 class='form-control'><div id='validaDebe"+i+"'></div>");
		           var haber=$("<input type='text' id='haber"+i+"' name=Haber[] value=0 class='form-control'><div id='validaHaber"+i+"'></div>");
		           var eliminar=$('<button type="button" name="remove" id="'+i+'" class="btn btn_remove btn-danger">x</button>');
		           divDropDownList.append(dropDown);
		           divDebe.append(debe);
		           divHaber.append(haber);
		           divEliminar.append(eliminar);
		           lineas.append(divDropDownList);
		           lineas.append(divDebe);
		           lineas.append(divHaber);
		           lineas.append(divEliminar);
			   $("#dynamic_field").append(lineas);
				var url = "<?php echo CController::createUrl('ComprobanteContable/CargaCuentasJs'); ?>";
		        $.ajax(
		            {
		               	type:"POST",
		                url: url,
		               	data:"id="+$("#rutEmpresa").val(),
		               	dataType:"html",
		               	success: function(data)
		               	{
		               		$('#dropDown'+i+'').html(data);
		               	}
		            });
           	} 
      }); 
     /*Accion para el boton borrar*/
      $(document).on("click", ".btn_remove", function(){  
           var button_id = $(this).attr("id");   
           $("#grupoLineas"+button_id+'').remove();
           i--;  
      });

      /*Accion para el boton Actualizar*/
      $("#update").click(function(){

	 	  var i=$("#hiddenI").val();
	 	  console.log(i);
			var id='<?php echo $model->NUMERO_COMPROBANTE; ?>';
           	var tipoComprobante = $("#tipoComprobante").val();
           	var x = i;
           	while(x > 0)
           	{
           		sumaDebe += parseInt($("#debe"+x+'').val());
           		sumaHaber += parseInt($("#haber"+x+'').val());
           		x--;
           	}
	 		resultado = sumaDebe - sumaHaber;
		    if(resultado == 0)
			{
				var url = "<?php echo CController::createUrl('comprobanteContable/update&id="+id+"'); ?>";
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
	           	   				
	           	   				$(".panel-primary").animate({scrollTop:0},'slow');
								$("#mensaje").html("Se actualizaron las lineas contables");
								$("#mensaje").addClass("alert alert-success");
			               	}
			            });				
			}
			else
			{
				$(".panel-primary").animate({scrollTop:0},'slow');
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

