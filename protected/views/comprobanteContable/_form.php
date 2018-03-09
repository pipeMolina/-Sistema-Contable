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


	<div class="form-group" method="post" id="formulario">
		<div class="col-lg-5"> 
			<?php echo $form->labelEx($model,'RUT_EMPRESA'); ?>
			<?php echo $form->dropDownList($model,'RUT_EMPRESA',CHtml::listData(Empresa::model()->findAll(), 'RUT_EMPRESA', 'GIRO_EMPRESA'), 
					array("class"=>"form-control",
							"id"=>"rutEmpresa",
							"empty" => "Elige Empresa",
							'ajax' => array(
								'type'=>'POST',
								'url'=>CController::createUrl('ComprobanteContable/CargaCuentas'),
								'update'=>'#'.CHtml::activeId($modelLinea,"CUENTA"),
							)
							)); ?>
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
			<?php echo $form->textField($model,'FECHA_COMPROBANTE',array('id'=>'fecha','class'=>'form-control')); ?>
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

</div>
<?php $this->endWidget(); ?>
<div class="form-group">
		<table class="table table-striped table-hover" id="dynamic_field">
			<div id="row1">
				<div class="col-lg-4">
			        <?php
			        echo $form->labelEx($modelLinea, "CUENTA");
			        echo $form->dropDownList($modelLinea,"CUENTA",array(),array('class'=>'form-control'));
			        echo $form->error($modelLinea, "CUENTA");
			        ?>
			    </div>
			    <div class="col-lg-3">
			        <?php
			        echo $form->labelEx($modelLinea, "DEBE");
			        echo $form->textField($modelLinea, "DEBE",array('class'=>'form-control'));
			        echo $form->error($modelLinea, "DEBE");
			        ?>
			    </div> 
			    <div class="col-lg-3">
			        <?php
			        echo $form->labelEx($modelLinea, "HABER");
			        echo $form->textField($modelLinea, "HABER",array('class'=>'form-control'));
			        echo $form->error($modelLinea, "HABER");
			        ?> 
			    </div>
			</div>
		</table>
</div>
<div class="form-group">
	<div class="col-lg-3">
	     <button id="add" class="btn btn-default">Agregar Linea</button>
	 </div>
	 <div class="col-lg-3">
	     <button id="create" type="submit" class="btn btn-primary">Guardar Comprobante</button>
	 </div>
</div>

 <script type="text/javascript">  
 var i=1;
 $(document).ready(function(){ 

       
      $("#add").click(function(){ 
           i++; 
           var rutEmpresa=$("#rutEmpresa").val();
           if (rutEmpresa=="") 
           {
           	alert("debe elegir empresa")
           }  
           else
           {
	      	   var divrow=$('<div id="row'+i+'"></div>');
	      	   var divDropDownList=$('<div class=\"col-lg-4\" ><br></div>');
	      	   var divDebe=$('<div class=\"col-lg-3\" ><br></div>');
	      	   var divHaber=$('<div class=\"col-lg-3\" ><br></div>');
	      	   var divEliminar=$('<div class=\"col-lg-2\" ><br></div>');
	           //alert('row'+i);
	           var dropDown = $("<select id='resultado"+i+"' name=\"selectName\" class=\"form-control\"/>");
	           var debe=$('<?php echo $form->textField($modelLinea,"DEBE",array("class"=>"form-control"))?>');
	           var haber=$('<?php echo $form->textField($modelLinea,"HABER",array("class"=>"form-control"));?>');
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
	               		data:$("#formulario").serialize(),
		               	data:"id="+$("#rutEmpresa").val(),
		               	dataType:"html",
		               	success: function(data)
		               	{
		               		$('#resultado'+i+'').html(data);
		               	}
		            });
           	
           }
			
          // $("#dynamic_field").append('<div id="row'+i+'"><div class="col-lg-4"></div><div class="col-lg-3"> <br><?php echo $form->textField($modelLinea,"DEBE",array("class"=>"form-control","id"=>""));?></div> <div class="col-lg-3"><br><?php echo $form->textField($modelLinea,"HABER",array("class"=>"form-control","id"=>""));?></div> <div class="col-lg-2"> <br><button type="button" name="remove" id="'+i+'" class="btn btn_remove btn-danger">x</button></div></div>');  
      }); 
     
      $(document).on("click", ".btn_remove", function(){  
           var button_id = $(this).attr("id");   
           $("#row"+button_id+'').remove();  
      });  
 
 }); 
 </script>












<?php
/*

<div class="container">  
                <br />  
                <br />  
                <h2 align="center">Dynamically Add or Remove input fields in PHP with JQuery</h2>  
                <div class="form-group">  
                     <form name="add_name" id="add_name">  
                          <div class="table-responsive">  
                               <table class="table table-bordered" id="dynamic_field">  
                                    <tr>  
                                         <td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td>  
                                         <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                                    </tr>  
                               </table>  
                               <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />  
                          </div>  
                     </form>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      $('#submit').click(function(){            
           $.ajax({  
                url:"name.php",  
                method:"POST",  
                data:$('#add_name').serialize(),  
                success:function(data)  
                {  
                     alert(data);  
                     $('#add_name')[0].reset();  
                }  
           });  
      });  
 });  
 </script>

*/
?>