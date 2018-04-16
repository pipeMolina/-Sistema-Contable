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
<?php// $row_id = "modelLinea-" . $key ?>

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
			<?php echo $form->dropDownList($model,'ID_TIPOCOMP',CHtml::listData(TipoComprobante::model()->findAll(), 'ID_TIPOCOMP', 'NOMBRE_TIPOCOMP'), array("class"=>"form-control","empty" => "Elige Tipo Comprobante")); ?>
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
		<table class="table" id="dynamic_field">
			<div class="form-group">
				<div class="col-lg-4"><br>
					<?php echo $form->labelEx($modelLinea,'CUENTA'); ?>
				</div>
				<div class="col-lg-3"><br>
					<?php echo $form->labelEx($modelLinea,'DEBE'); ?><div id="totalDebe"></div>
                    <?php echo '<input id="hiddenD" type="hidden" name="hiddenD" value="0">';  ?> 

				</div>
				<div class="col-lg-3"><br>
					<?php echo $form->labelEx($modelLinea,'HABER'); ?><div id="totalHaber"></div>
					<?php echo '<input id="hiddenH" type="hidden" name="hiddenH" value="0">';  ?>
				</div>
			</div>
			<!--Aqui se agregan los campos de texto mediante JQuery-->
		</table>

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
</div>
<?php $this->endWidget(); ?>
<!--Muestra el plan de cuentas según el rut de la empresa-->

<div id="resultado"></div>


 <script type="text/javascript">  

	      function total(n,obj,fila)
	      {
	      	console.log(fila);
	      
    		if (!/^([0-9])*$/.test(obj))
    		{
    			$('#validaDebe'+1+'').html("la wea no es numero");
    			$('#validaDebe'+1+'').addClass('bg-warning');
    		}

	      	else if(n==1)
	      	{
	      		document.getElementById('hiddenD').value = parseInt(obj)+parseInt(document.getElementById('hiddenD').value);
           	   	$("#totalDebe").html(document.getElementById('hiddenD').value);
	      	}
	      	else
	      	{
	      		document.getElementById('hiddenH').value = parseInt(obj)+parseInt(document.getElementById('hiddenH').value);
           	   	$("#totalHaber").html(document.getElementById('hiddenH').value);
	      	}


	      }  
 $(document).ready(function(){ 
 	  
 	  //$('#datepicker').datepicker();
 	  
 	  var i=0;
      var sumaDebe=0;
      var sumaHaber=0;
      $("#add").click(function(){ 
            
           var rutEmpresa=$("#rutEmpresa").val();
           if (rutEmpresa=="") 
           {
           	alert("Debe elegir empresa")
           }  
           else
           {
           	  // $("#rutEmpresa").prop("disabled",true);
           	   i++;
	      	   var divrow=$('<div id="row'+i+'"></div>');
	      	   var divDropDownList=$('<div class=\"col-lg-4\" ><br></div>');
	      	   var divDebe=$('<div class=\"col-lg-3\" ><br></div>');
	      	   var divHaber=$('<div class=\"col-lg-3\" ><br></div>');
	      	   var divEliminar=$('<div class=\"col-lg-2\" ><br></div>');
	           //alert('row'+i);
	           var dropDown = $("<select id='resultado"+i+"' name=\"Cuenta[]\" class=\"form-control\"/>");
	           var debe=$('<?php echo $form->textField($modelLinea,"DEBE[]",array("class"=>"form-control","onchange"=>"total(1,this.value,1);"))?><div id="validaDebe'+i+'"></div>');
	           var haber=$('<?php echo $form->textField($modelLinea,"HABER[]",array("class"=>"form-control","onchange"=>"total(0,this.value,'i');"));?>');
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
		               		$('#resultado'+i+'').html(data);
		               	}
		            });
           }  
      }); 
     
      $(document).on("click", ".btn_remove", function(){  
           var button_id = $(this).attr("id");   
           $("#row"+button_id+'').remove();  
      });

      $("#submit").click(function(){

			var url = "<?php echo CController::createUrl('comprobanteContable/create'); ?>";
			var sumaDebe=$("#hiddenD").val();
			var sumaHaber=$("#hiddenH").val();
			
			if(sumaDebe==sumaHaber)
			{
	      		$.ajax(
			            {
			               	type:"POST",
			                url: url,
		               		data:$("#comprobante-contable-form").serialize(),
			               	success: function(data)
			               	{
	           	   				//alert("hola");
	           	   				$("#mensaje").html(data);
	           	   				//SrollTop: $("#mensaje").offset().top,1000;
	      						location.href ="#mensaje";
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
				location.href ="#mensaje";
				$("#mensaje").html("hjkadf");
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

