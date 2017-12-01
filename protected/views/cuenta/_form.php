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

	<legend><p class="note">Campos con <span class="required">*</span> son obligatorios.</p></legend>
   
	<div class="form-group">
		<div class="col-md-4">
			<?php echo $form->labelEx($model,'ID_PLANCUENTA'); ?>
			<?php  	
				echo $form->dropDownList($model,'ID_PLANCUENTA',CHtml::listData(plancuenta::model()->findAll(), 'ID_PLANCUENTA', 'DESCRIPCION_PLANCUENTA'), array("class"=>"form-control","id"=>"test"));
				
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
				 	'ajax' => array(
								'type'=>'POST',
								'url'=>CController::createUrl('cuenta/selectSubtipos'),
								'update'=>'#'.CHtml::activeId(cuenta::model(),'ID_SUBTIPOCUENTA'),
							)
				 	)); ?>
			<!--<?php //echo $form->textField($model,'ID_TIPOCUENTA',array("class"=>"form-control")); ?>-->
			<?php echo $form->error($model,'ID_TIPOCUENTA'); ?>
		</div>
		<div class="col-md-4">
			<?php echo $form->labelEx($model,'ID_SUBTIPOCUENTA'); ?>
			<?php echo $form->dropDownList($model,'ID_SUBTIPOCUENTA', array(),
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
	<button> Ver dato del dropdown</button>

<?php $this->endWidget(); ?>

</div><!-- form -->

<!--Obtener datos de la tabla cuenta para mostrar en el tree panel-->
<?php 
    
    $sql='SELECT ID_SUBTIPOCUENTA,DESCRIPCION_CUENTA FROM cuenta WHERE ID_PLANCUENTA=52;';
    $dataReader = Yii::app()->db->createCommand($sql)->queryAll();
?>



<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Plan de Cuentas <?php echo '"aqui va el nombre de la empresa"'?></div>
        <div class="panel-body">
            <!-- TREEVIEW CODE -->
            <ul class="treeview">
                <li><a href="#">Activo </a>
                    <ul>
                        <li><a href="#">Activo Circulante</a><!--Inicio Activo Circulante-->
                            <ul>

                                <?php
                                     foreach ($dataReader as $key => $value) 
                                    if($value['ID_SUBTIPOCUENTA']==10100000){
                                {?>
                                    <li><p> <?php echo $value['DESCRIPCION_CUENTA'];?></p></li>
                                <?php }}?>
                                               
                            </ul>
                        </li><!-- Fin Activo Circulante -->
                        <li><a href="#">Activo Fijo</a><!--Inicio Activo Fijo-->
                            <ul>
                                <?php 
                                foreach ($dataReader as $key => $value) 
                                    if($value['ID_SUBTIPOCUENTA']==10200000){ 
                                {?>
                                    <li><p> <?php echo $value['DESCRIPCION_CUENTA'];?></p></li>
                                <?php }}?>
                                               
                            </ul>
                        </li><!-- Fin Activo Fijo -->
                        <li><a href="#">Activo Into</a><!--Inicio Activo Into-->
                            <ul>
                                <?php 
                                foreach ($dataReader as $key => $value) 
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
                                     foreach ($dataReader as $key => $value) 
                                    if($value['ID_SUBTIPOCUENTA']==20100000){
                                {?>
                                    <li><p> <?php echo $value['DESCRIPCION_CUENTA'];?></p></li>
                                <?php }}?>
                                               
                            </ul>
                        </li><!-- Fin Activo Circulante -->
                        <li><a href="#">Pasivo Largo Plazo</a><!--Inicio Activo Fijo-->
                            <ul>
                                <?php 
                                foreach ($dataReader as $key => $value) 
                                    if($value['ID_SUBTIPOCUENTA']==20200000){ 
                                {?>
                                    <li><p> <?php echo $value['DESCRIPCION_CUENTA'];?></p></li>
                                <?php }}?>
                                               
                            </ul>
                        </li><!-- Fin Activo Fijo -->
                        <li><a href="#">Patrimonio</a><!--Inicio Activo Into-->
                            <ul>
                                <?php 
                                foreach ($dataReader as $key => $value) 
                                    if($value['ID_SUBTIPOCUENTA']==20300000){
                                {?>
                                    <li><p> <?php echo $value['DESCRIPCION_CUENTA'];?></p></li>
                                <?php }}?>
                                               
                            </ul>
                        </li><!-- Fin Activo Into -->
                    </ul>                  
                  </li>
            </ul>
            <!-- TREEVIEW CODE -->
        </div>
    </div>
   

<script>
    $.fn.extend({
    treeview:function() {
        
        return this.each(function() {
            // Initialize the top levels;
            var tree = $(this);
            tree.addClass('treeview-tree');
            tree.find('li').each(function() {
                var stick = $(this);
            });
            tree.find('li').has("ul").each(function () {
                var branch = $(this); //li with children ul
                
                branch.prepend("<i class='tree-indicator glyphicon glyphicon-plus'></i>");
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
$("button").click(function()
{
	alert($("#test").val());
});


</script>

