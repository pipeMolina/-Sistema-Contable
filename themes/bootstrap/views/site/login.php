<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Acceso';
$this->breadcrumbs=array(
	'Acceso',
);
?>
<div class="my-container">
<h1>Acceder <small>a su cuenta <?php echo Yii::app()->name  ?></small></h1>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'htmlOptions' => array('class'=>'form-horizontal'),
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<div class="jumbotron">
	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<div class="form-group">
		<div class="col-lg-12">
			<?php echo $form->labelEx($model,'username'); ?>
			<?php echo $form->textField($model,'username',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'username'); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-12">
			<?php echo $form->labelEx($model,'password'); ?>
			<?php echo $form->passwordField($model,'password',array('class'=>'form-control')); ?>
			<?php echo $form->error($model,'password'); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-lg-12">
			<?php echo $form->checkBox($model,'rememberMe'); ?>
			<?php echo $form->label($model,'rememberMe'); ?>
			<?php echo $form->error($model,'rememberMe'); ?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-12">
			<?php echo CHtml::submitButton('Login',array('class' =>'btn btn-primary')); ?>
		</div>
	</div>
</div>
<?php $this->endWidget(); ?>
</div><!-- form -->
</div>