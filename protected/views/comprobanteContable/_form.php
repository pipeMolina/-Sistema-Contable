

<?php
/* @var $this ComprobanteContableController */
/* @var $model ComprobanteContable */
/* @var $form CActiveForm */
$this->setMenu('action-c');
$this->setMenu('action-r');
$this->setMenu('action-u');
$this->setMenu('action-d');

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
<div class="panel-heading text-center"><h1 class="panel-title">Crear Comprobante Contable</h1></div>
	<div class="panel-body">
	<legend><p class="note">Campos con <span class="required">*</span> son obligatorios.</p></legend>
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
			    			'name'=>'FECHA',
			    			'language'=>'es',
			    			'attribute' =>'FECHA',
							'value'	=>$model->FECHA_COMPROBANTE,
						    // additional javascript options for the date picker plugin
						    'options'=>array(
						        'showAnim'=>'fold',
						        'constrainInput'=>true,
								'currentText'=>'Now',
						        'dateFormat'=>'yy-mm-dd',
								'altField' => '#FECHA',
								'altFormat' => 'dd-mm-yy',
						    ),
						    'htmlOptions'=>array(
						        'class'=>'form-control',
						        'onchange'=>'Asignate(this)'
						    ),
						));
				?>
				<?php echo $form->hiddenField($model,'FECHA_COMPROBANTE');?>
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
			<div class="form-group">
				<div class="col-lg-4">
					<?php echo $form->labelEx($modelLinea,'CUENTA'); ?>
				</div>
				<div class="col-lg-3">
					<?php echo $form->labelEx($modelLinea,'DEBE'); ?>
				</div>
				<div class="col-lg-3">
					<?php echo $form->labelEx($modelLinea,'HABER'); ?>
				</div>
			</div>
			<table class="table" id="dynamic_field">
				<!--Aqui se agregan los campos de texto mediante JQuery-->
			</table>
		</div>

		<div class="form-group">
			<div class="col-lg-3">
			     <button id="add" type="button" class="btn btn-default" >Agregar Linea</button>
			 </div>
			 <div class="col-lg-3">
			     <!--<button id="submit" type="button" class="btn btn-primary">Guardar Comprobante</button>-->
			 </div>
		</div>
	</div>
	</div>
<?php $this->endWidget(); ?>
</div>
<!--Muestra el plan de cuentas según el rut de la empresa-->

<div id="resultado"></div>


<script type="text/javascript">  

 $(document).ready(function(){ 
 	  /*Variables Globales*/
 	  var i=0;
      var sumaDebe=0;
      var sumaHaber=0;
      var valueDebe=0;
      var valueHaber=0;
      var resultado=0;
      /*Accion para el boton agregar*/
      $("#add").click(function(){ 
      	   var rutEmpresa=$("#rutEmpresa").val();
           if (rutEmpresa == "") 
           {
	           	$("#mensaje").html("Debe elegir Empresa");
				$("#mensaje").addClass("alert alert-dismissible alert-warning");
           } 
           else
           {
			       i++;
           	   	   var lineas=$('<div class="form-group" id="grupoLineas'+i+'"></div>');
		      	   var divDropDownList=$('<div class=\"col-lg-4\" id="row'+i+'"></div>');
		      	   var divDebe=$('<div class=\"col-lg-3\" id="row'+i+'"></div>');
		      	   var divHaber=$('<div class=\"col-lg-3\" id="row'+i+'"></div>');
		      	   var divEliminar=$('<div class=\"col-lg-2\" id="row'+i+'"></div>');
		           //alert('row'+i);
		           var dropDown = $("<select id='dropDown"+i+"' name=Cuenta[] class='form-control'/><div id='validaDropDown"+i+"'></div>");
		           var debe=$("<input type='text' id='debe"+i+"' name=Debe[] value=0 class='form-control'><div id='validaDebe"+i+"'></div>");
		           var haber=$("<input type='text' id='haber"+i+"' name=Haber[] value=0 class='form-control'><div id='validaHaber"+i+"'></div>");
		           //var debe=$('<?php echo $form->textField($modelLinea,"DEBE[]",array("class"=>"form-control","onchange"=>"total(1,this.value);","id"=>"debe1"))?><div id="validaDebe'+i+'"></div>');
		           //var haber=$('<?php echo $form->textField($modelLinea,"HABER[]",array("class"=>"form-control","onchange"=>"total(0,this.value,'i');"));?>');
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

      /*Accion para el boton guardar*/
      $("#submit").click(function(){

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

/* Invierte la fecha */
    function Asignate(obj)
    {
        var choose = obj.value;
        console.log(choose.id);
        var pieces = choose.split('-');
		pieces.reverse();
		var reversed = pieces.join('-');
        document.getElementById('ComprobanteContable_FECHA_COMPROBANTE').value = reversed;
        document.getElementById('FECHA').value = choose;
}
</script>

<div class="form">
    <div class="panel panel-primary">
        <div class="panel-heading text-center"><h1 class="panel-title"> Plan de Cuentas</h1> </div>
            <!-- TREEVIEW CODE -->
            <ul class="treeview">
                <li><a href="#">Activo </a>
                    <ul>
                        <li><a href="#">Activo Circulante</a><!--Inicio Activo Circulante-->
                            <ul>

                                <?php
                                     foreach ($model as $key => $value) 
                                    if($value['ID_SUBTIPOCUENTA']==10100000){
                                {?>
                                    <li><p> <?php echo $value['DESCRIPCION_CUENTA'];?></p></li>
                                <?php }}?>
                                               
                            </ul>
                        </li><!-- Fin Activo Circulante -->
                        <li><a href="#">Activo Fijo</a><!--Inicio Activo Fijo-->
                            <ul>
                                <?php 
                                foreach ($model as $key => $value) 
                                    if($value['ID_SUBTIPOCUENTA']==10200000){ 
                                {?>
                                    <li><p> <?php echo $value['DESCRIPCION_CUENTA'];?></p></li>
                                <?php }}?>
                                               
                            </ul>
                        </li><!-- Fin Activo Fijo -->
                        <li><a href="#">Activo Into</a><!--Inicio Activo Into-->
                            <ul>
                                <?php 
                                foreach ($model as $key => $value) 
                                    if($value['ID_SUBTIPOCUENTA']==10300000){
                                {?>
                                    <li><p> <?php echo $value['DESCRIPCION_CUENTA'];?></p></li>
                                <?php }}?>
                                               
                            </ul>
                        </li><!-- Fin Activo Into -->
                    </ul>                  
                  </li>

                  <li><a href="#">Pasivo </a>
                    <ul>
                        <li><a href="#">Pasivo Exigible</a><!--Inicio Activo Circulante-->
                            <ul>

                                <?php
                                     foreach ($model as $key => $value) 
                                    if($value['ID_SUBTIPOCUENTA']==20100000){
                                {?>
                                    <li><p> <?php echo $value['DESCRIPCION_CUENTA'];?></p></li>
                                <?php }}?>
                                               
                            </ul>
                        </li><!-- Fin Activo Circulante -->
                        <li><a href="#">Pasivo Largo Plazo</a><!--Inicio Activo Fijo-->
                            <ul>
                                <?php 
                                foreach ($model as $key => $value) 
                                    if($value['ID_SUBTIPOCUENTA']==20200000){ 
                                {?>
                                    <li><p> <?php echo $value['DESCRIPCION_CUENTA'];?></p></li>
                                <?php }}?>
                                               
                            </ul>
                        </li><!-- Fin Activo Fijo -->
                        <li><a href="#">Patrimonio</a><!--Inicio Activo Into-->
                            <ul>
                                <?php 
                                foreach ($model as $key => $value) 
                                    if($value['ID_SUBTIPOCUENTA']==20300000){
                                {?>
                                    <li><p> <?php echo $value['DESCRIPCION_CUENTA'];?></p></li>
                                <?php }}?>
                                               
                            </ul>
                        </li><!-- Fin Activo Into -->
                    </ul>                  
                  </li>
                  <li><a href="#">Perdida </a>
                    <ul>
                        <li><a href="#">Perdida Resultado</a><!--Inicio Perdida-->
                            <ul>

                                <?php
                                     foreach ($model as $key => $value) 
                                    if($value['ID_SUBTIPOCUENTA']==30100000){
                                {?>
                                    <li><p> <?php echo $value['DESCRIPCION_CUENTA'];?></p></li>
                                <?php }}?>              
                            </ul>
                        </li>
                    </ul>                  
                  </li>
                  <li><a href="#">Ganancia </a>
                    <ul>
                        <li><a href="#">Ganancia Resultado</a><!--Inicio Ganancia-->
                            <ul>

                                <?php
                                     foreach ($model as $key => $value) 
                                    if($value['ID_SUBTIPOCUENTA']==40100000){
                                {?>
                                    <li><p> <?php echo $value['DESCRIPCION_CUENTA'];?></p></li>
                                <?php }}?>              
                            </ul>
                        </li>
                    </ul>                  
                  </li>
            </ul>
            <!-- TREEVIEW CODE -->
    </div>
</div>

<script>
   $.fn.extend({
    treeview:   function() {
        return this.each(function() {
            // Initialize the top levels;
            var tree = $(this);
        
            tree.find('li').has("ul").each(function () {
                var branch = $(this); //li with children ul
                
                branch.prepend("<i class='tree-indicator glyphicon glyphicon-chevron-right'></i>");
                branch.addClass('tree-branch');
                branch.on('click', function (e) {
                    if (this == e.target) {
                        var icon = $(this).children('i:first');
                        
                        icon.toggleClass("glyphicon-chevron-down glyphicon-chevron-right");
                        $(this).children().children().toggle();
                    }
                })
                branch.children().children().toggle();
                
                /**
                 *  The following snippet of code enables the treeview to
                 *  function when a button, indicator or anchor is clicked.
                 *
                 *  It also prevents the default function of an anchor and
                 *  a button from firing.
                 */
                branch.children('.tree-indicator, button, a').click(function(e) {
                    branch.click();
                    
                    e.preventDefault();
                });
            });
        });
    }
});

/**
 *  The following snippet of code automatically converst
 *  any '.treeview' DOM elements into a treeview component.
 */
$(window).on('load', function () {
    $('.treeview').each(function () {
        var tree = $(this);
        tree.treeview();
    })
})
  
</script>

