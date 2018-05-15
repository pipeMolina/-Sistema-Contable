<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
	
	<?php
	  $baseUrl = Yii::app()->theme->baseUrl; 
	  $cs = Yii::app()->getClientScript();
	  Yii::app()->clientScript->registerCoreScript('jquery');
	?>
	<?php 
		$cs->registerCssFile($baseUrl.'/css/bootstrap.min.css');
		$cs->registerCssFile($baseUrl.'/css/bootstrap.css');
		$cs->registerCssFile($baseUrl.'/css/bootstrap-treepanel.css');
	?>
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="navbar navbar-inverse fixed-top">
  <div class="container">
	<div class="navbar-header">
		<a class="navbar-brand" href="<?php echo Yii::app()->homeUrl; ?>"> <?php echo Yii::app()->name ?> </a>
	</div>
   </div>
</div>
<div class="navbar navbar-default">
  <div class="container">
	<div class="navbar-collapse">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				//array('label'=>'Home', 'url'=>array('/site/index')),
				//array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				//array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Empresa', 'url'=>array('/Empresa/index'),'visible'=>Yii::app()->user->Contador() || Yii::app()->user->Secretario()),
				array('label'=>'Plan Cuenta', 'url'=>array('/PlanCuenta/index'),'visible'=>Yii::app()->user->Contador() || Yii::app()->user->Secretario()),
				array('label'=>'Cuenta', 'url'=>array('/Cuenta/index'),'visible'=>Yii::app()->user->Contador()),
				array('label'=>'Comprobante Contable', 'url'=>array('/ComprobanteContable/index'),'visible'=>Yii::app()->user->Contador() || Yii::app()->user->Secretario()),
				//array('label'=>'Linea Contable', 'url'=>array('/lineaContable/index')),
				//array('label'=>'Tipo Cuenta', 'url'=>array('/TipoCuenta/index')),
				array('label'=>'Reportes', 'url'=>array('/reportes/index'),'visible'=>Yii::app()->user->Contador() || Yii::app()->user->Secretario()),
				array('label'=>'Ciudad', 'url'=>array('/Ciudad/index'),'visible'=>Yii::app()->user->Administrador()),
				array('label'=>'Region', 'url'=>array('/Region/index'),'visible'=>Yii::app()->user->Administrador()),
				array('label'=>'Usuario', 'url'=>array('/Usuario/index'),'visible'=>Yii::app()->user->Administrador()),
				array('label'=>'Iniciar Sesion', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Cerrar Sesion ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
			'htmlOptions'=>array('class'=>'nav navbar-nav pull-right'),
		)); ?>
	</div>
  </div>
</div>

<div class="container">
	<div class="breadcrumb">
			<?php if(isset($this->breadcrumbs)):?>
				<?php $this->widget('zii.widgets.CBreadcrumbs', array(
					'links'=>$this->breadcrumbs,
				)); ?>
			<?php endif?>
			
	</div>
</div>
<div class="container">
	<?php echo $content; ?>
</div>
	
<div class="footer text-center" >
		Sistema Contable <?php echo date('Y'); ?>.<br/>			
		Carlos Molina.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->


</body>
</html>
