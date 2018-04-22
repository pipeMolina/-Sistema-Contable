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
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>


	<?php echo $form->errorSummary($model,$modelLinea); ?>
<div div class="panel panel-primary">
<div class="panel-heading text-center"><h1 class="panel-title">Crear Comprobante Contable</h1></div>
	<div class="panel-body">
		<div id="mensaje"></div>
		<div class="form-group">
			<div class="col-lg-5"> 
				<?php echo $form->labelEx($model,'RUT_EMPRESA'); ?>
				<?php echo $form->dropDownList($model,'RUT_EMPRESA',CHtml::listData(Empresa::model()->findAll(), 'RUT_EMPRESA', 'GIRO_EMPRESA'), array("class"=>"form-control","id"=>"rutEmpresa","onchange"=>"treePanel()","empty" => "Elige Empresa")); ?>
				<?php //echo $form->textField($model,'RUT_EMPRESA',array("class"=>"form-control",'size'=>12,'maxlength'=>12)); ?>
				<?php echo $form->error($model,'RUT_EMPRESA'); ?>
			</div>
			<div class="col-lg-4"> 
				<?php echo $form->labelEx($model,'ID_TIPOCOMP'); ?>
				<?php echo $form->dropDownList($model,'ID_TIPOCOMP',CHtml::listData(TipoComprobante::model()->findAll(), 'ID_TIPOCOMP', 'NOMBRE_TIPOCOMP'), array("class"=>"form-control","empty" => "Elige Tipo Comprobante","id"=>"tipoComprobante")); ?>
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
			<br></br>
		</div>
		<div>
			<table class="table" id="dynamic_field">
				<div class="form-group">
					<div class="col-lg-4"><br>
						<?php echo $form->labelEx($modelLinea,'CUENTA'); ?>
					</div>
					<div class="col-lg-3"><br>
						<?php echo $form->labelEx($modelLinea,'DEBE'); ?>
					</div>
					<div class="col-lg-3"><br>
						<?php echo $form->labelEx($modelLinea,'HABER'); ?>
					</div>
				</div>
				<!--Aqui se agregan los campos de texto mediante JQuery-->
			</table>
		</div>

		<div class="form-group">
			<div class="col-lg-3">
			     <button id="add" type="button" class="btn btn-default" >Agregar Linea</button>
			 </div>
			 <div class="col-lg-3">
			     <button id="submit" type="button" class="btn btn-primary">Guardar Comprobante</button>
			 </div>
		</div>
	</div>
	</div>
<?php $this->endWidget(); ?>
<!--Muestra el plan de cuentas según el rut de la empresa-->

<div id="resultado"></div>


 <script type="text/javascript">  

	/*function total(n,obj)
	{ 	
	   	if(n==1)
	   	{
	   		document.getElementById('hiddenD').value = parseInt(obj)+parseInt(document.getElementById('hiddenD').value);
	   		$("#totalDebe").html(document.getElementById('hiddenD').value);

       	   	$('#validaDebe'+i+'').empty();
       	   	$('#validaDebe'+i+'').removeClass("alert-danger");
	   	}
	  	else
	   	{
	   		document.getElementById('hiddenH').value = parseInt(obj)+parseInt(document.getElementById('hiddenH').value);
	   		$("#totalHaber").html(document.getElementById('hiddenH').value);

	   	}
	} */ 
 $(document).ready(function(){ 
 	  /*Variables Globales*/
 	  var i=0;
      var sumaDebe=0;
      var sumaHaber=0;
      var resultado=0;
      var valueDebe=0;
      var valueHaber=0;
      /*Accion para el boton agregar*/
      $("#add").click(function(){ 
      	   var rutEmpresa=$("#rutEmpresa").val();
           if (rutEmpresa == "") 
           {
	           	$("#mensaje").html("Debe elegir Empresa");
				$("#mensaje").addClass("alert alert-dismissible alert-warning");
           } 
           else if(i>0)
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
           	   	   var divrow=$('<div id="row'+i+'"></div>');
		      	   var divDropDownList=$('<div class=\"col-lg-4\" ><br></div>');
		      	   var divDebe=$('<div class=\"col-lg-3\" ><br></div>');
		      	   var divHaber=$('<div class=\"col-lg-3\" ><br></div>');
		      	   var divEliminar=$('<div class=\"col-lg-2\" ><br></div>');
		           //alert('row'+i);
		           var dropDown = $("<select id='dropDown"+i+"' name=\"Cuenta[]\" class=\"form-control\"/><div id='validaDropDown"+i+"'></div>");
		           var debe=$("<input type='text' id='debe"+i+"' name=Debe[] value=0 class='form-control'><div id='validaDebe"+i+"'></div>");
		           var haber=$("<input type='text' id='haber"+i+"' name=Haber[] value=0 class='form-control'><div id='validaHaber"+i+"'></div>");
		           //var debe=$('<?php echo $form->textField($modelLinea,"DEBE[]",array("class"=>"form-control","onchange"=>"total(1,this.value);","id"=>"debe1"))?><div id="validaDebe'+i+'"></div>');
		           //var haber=$('<?php echo $form->textField($modelLinea,"HABER[]",array("class"=>"form-control","onchange"=>"total(0,this.value,'i');"));?>');
		           var eliminar=$('<button type="button" name="remove" id="'+i+'" class="btn btn_remove btn-danger">x</button>');
		           divDropDownList.append(dropDown);
		           divDebe.append(debe);
		           divHaber.append(haber);
		           divEliminar.append(eliminar);
		           divrow.append(divDropDownList);
		           divrow.append(divDebe);
		           divrow.append(divHaber);
		           divrow.append(divEliminar);
					$("#dynamic_field").append(divrow);
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
	      	   var divrow=$('<div id="row'+i+'"></div>');
	      	   var divDropDownList=$('<div class=\"col-lg-4\" ><br></div>');
	      	   var divDebe=$('<div class=\"col-lg-3\" ><br></div>');
	      	   var divHaber=$('<div class=\"col-lg-3\" ><br></div>');
	      	   var divEliminar=$('<div class=\"col-lg-2\" ><br></div>');
	           //alert('row'+i);
	           var dropDown = $("<select id='dropDown"+i+"' name=\"Cuenta[]\" class=\"form-control\"/><div id='validaDropDown"+i+"'></div>");
	           var debe=$("<input type='text' id='debe"+i+"' name=Debe[] value=0 class='form-control'><div id='validaDebe"+i+"'></div>");
		       var haber=$("<input type='text' id='haber"+i+"' name=Haber[] value=0 class='form-control'><div id='validaHaber"+i+"'></div>");
	           //var debe=$('<?php echo $form->textField($modelLinea,"DEBE[]",array("class"=>"form-control","onchange"=>"total(1,this.value);","id"=>"debe1"))?><div id="validaDebe'+i+'"></div>');
	           //var haber=$('<?php echo $form->textField($modelLinea,"HABER[]",array("class"=>"form-control","onchange"=>"total(0,this.value,'i');"));?>');
	           var eliminar=$('<button type="button" name="remove" id="'+i+'" class="btn btn_remove btn-danger">x</button>');
	           divDropDownList.append(dropDown);
	           divDebe.append(debe);
	           divHaber.append(haber);
	           divEliminar.append(eliminar);
	           divrow.append(divDropDownList);
	           divrow.append(divDebe);
	           divrow.append(divHaber);
	           divrow.append(divEliminar);
			   $("#dynamic_field").append(divrow);
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
           $("#row"+button_id+'').remove();
           i--;  
      });

      /*Accion para el boton guardar*/
      $("#submit").click(function(){

			//var sumaDebe=$("#hiddenD").val();
			//var sumaHaber=$("#hiddenH").val();
           	var tipoComprobante = $("#tipoComprobante").val();
           	var x = i;
           	while(x > 0)
           	{
           		sumaDebe += parseInt($("#debe"+x+'').val());
           		sumaHaber += parseInt($("#haber"+x+'').val());
           		x--;
           	}
	 		resultado = sumaDebe - sumaHaber;
            if(tipoComprobante == "")
           	{
           		$(".panel-primary").animate({scrollTop:0},'slow');
           		$("#mensaje").html("Debe elegir Tipo");
				$("#mensaje").addClass("alert alert-dismissible alert-warning");
           	}
			else if(resultado == 0)
			{
				var url = "<?php echo CController::createUrl('comprobanteContable/create'); ?>";
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
	           	   				$("#hiddenD").val("0");
	           	   				$("#hiddenH").val("0");
	      						/*Se eliminan las lineas contables*/
					      		while(i>0)
					      		{
					      			$("#row"+i+'').remove(); 
					      			i--;
					      		}
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

