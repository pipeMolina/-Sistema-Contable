<?php
/* @var $this ComprobanteContableController */
/* @var $model ComprobanteContable */
/* @var $form CActiveForm */
?>
<!--
<script type="text/javascript">
	/* Invierte la fecha */
    function Asignate(target)
    {
        var choose = target.value;
        if(target.id == 'FECHA')
        {
        	var pieces = choose.split('-');
			pieces.reverse();
			var reversed = pieces.join('-');
            document.getElementById('FECHA_COMPROBANTE').value = reversed;
            document.getElementById('FECHA').value = choose;
        }
    }
</script>
-->
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
	<div class="panel-heading text-center"><h1 class="panel-title">Modificar Comprobante Contable <?php echo "N°".$model->NUMERO_COMPROBANTE; ?></h1></div>
		<div class="panel-body">
	<div class="form-group">
		<div class="col-lg-5"> 
			<?php echo $form->labelEx($model,'RUT_EMPRESA'); ?>
			<?php echo $form->dropDownList($model,'RUT_EMPRESA',CHtml::listData(Empresa::model()->findAll(), 'RUT_EMPRESA', 'GIRO_EMPRESA'), array("class"=>"form-control","id"=>"rutEmpresa","disabled" => "disabled","onchange"=>"treePanel()","empty" => "Elige Empresa")); ?>
			<?php //echo $form->textField($model,'RUT_EMPRESA',array("class"=>"form-control",'size'=>12,'maxlength'=>12)); ?>
			<?php echo $form->error($model,'RUT_EMPRESA'); ?>
		</div>
		<div class="col-lg-4"> 
			<?php echo $form->labelEx($model,'ID_TIPOCOMP'); ?>
			<?php echo $form->dropDownList($model,'ID_TIPOCOMP',CHtml::listData(TipoComprobante::model()->findAll(), 'ID_TIPOCOMP', 'NOMBRE_TIPOCOMP'), array("class"=>"form-control","empty" => "Elige Tipo Comprobante","disabled" => "disabled")); ?>
			<?php //echo $form->textField($model,'ID_TIPOCOMP',array("class"=>"form-control")); ?>
			<?php echo $form->error($model,'ID_TIPOCOMP'); ?>
		</div>

		<div class="col-lg-3">
			<?php echo $form->labelEx($model,'FECHA_COMPROBANTE'); ?>	
			<?php echo $form->TextField($model,'FECHA_COMPROBANTE',array("class"=>"form-control",'size'=>50,'maxlength'=>50,"disabled" => "disabled"));?>
			<?php echo $form->error($model,'FECHA_COMPROBANTE'); ?>
		</div>
	</div>

	<div class="form-group">
		<div class="col-lg-12">
			<?php echo $form->labelEx($model,'GLOSA_COMPROBANTE'); ?>
			<?php echo $form->textField($model,'GLOSA_COMPROBANTE',array("class"=>"form-control","disabled"=>"disabled",'size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'GLOSA_COMPROBANTE'); ?>
		</div>
	</div>
	<?php 
		for($i=0;$i<count($modelLinea);$i++)
		{
	?>
	<div class="form-group">
		<div class="col-lg-4">
			<?php echo $form->labelEx($modelLinea[$i],'CUENTA'); ?>
			<?php echo $form->dropDownList($modelLinea[$i],'CUENTA',CHtml::listData(Cuenta::model()->findAll(), 'CODIGO_CUENTA', 'DESCRIPCION_CUENTA'),array("class"=>"form-control")); ?>
			<?php echo $form->error($modelLinea[$i],'CUENTA'); ?>
		</div>
		<div class="col-lg-3">
			<?php echo $form->labelEx($modelLinea[$i],'DEBE'); ?>
			<?php echo $form->textField($modelLinea[$i],"DEBE",array("class"=>"form-control"))?>
			<?php echo $form->error($modelLinea[$i],'DEBE'); ?>
		</div>
		<div class="col-lg-3">
			<?php echo $form->labelEx($modelLinea[$i],'HABER'); ?>
			<?php echo $form->textField($modelLinea[$i],"HABER",array("class"=>"form-control"));?>
			<?php echo $form->error($modelLinea[$i],'HABER'); ?>
		</div>
	</div>
			
	<?php }
	?>
		<table class="table table-striped table-hover" id="dynamic_field">
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
 $(document).ready(function(){ 
 	  
 	  var i=0;
       
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
	           var debe=$('<?php echo $form->textField($modelLinea[0],"DEBE[]",array("class"=>"form-control"))?>');
	           var haber=$('<?php echo $form->textField($modelLinea[0],"HABER[]",array("class"=>"form-control"));?>');
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


 }); 

      $("#submit").click(function(){

			var url = "<?php echo CController::createUrl('comprobanteContable/update&id=134'); ?>";
      		$.ajax(
		            {
		               	type:"POST",
		                url: url,
	               		data:$("#comprobante-contable-form").serialize(),
		               	success: function(data)
		               	{
           	   				//alert("hola");
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