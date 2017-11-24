<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css"  />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.min.css" />

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-treepanel.css" />

	<?php
	  $baseUrl = Yii::app()->theme->baseUrl; 
	  $cs = Yii::app()->getClientScript();
	  Yii::app()->clientScript->registerCoreScript('jquery');
	?>

	
	

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="navbar navbar-default">
  <div class="container">
	<div class="navbar-header">
		<a class="navbar-brand" href="<?php echo Yii::app()->homeUrl; ?>"> <?php echo Yii::app()->name ?> </a>
	</div>

	<div class="collapse navbar-collapse">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				//array('label'=>'Home', 'url'=>array('/site/index')),
				//array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				//array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Empresa', 'url'=>array('/Empresa/index')),
				array('label'=>'Plan Cuenta', 'url'=>array('/PlanCuenta/index')),
				array('label'=>'Comprobante Contable', 'url'=>array('/ComprobanteContable/index')),
				array('label'=>'Linea Contable', 'url'=>array('/lineaContable/index')),
				array('label'=>'Cuenta', 'url'=>array('/Cuenta/index')),
				array('label'=>'Tipo Cuenta', 'url'=>array('/TipoCuenta/index')),
				array('label'=>'Ciudad', 'url'=>array('/Ciudad/index')),
				array('label'=>'Region', 'url'=>array('/Region/index')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
			'htmlOptions'=>array('class'=>'nav navbar-nav'),
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
	<?php echo $content; ?>
	
</div>
<br></br>
<div class="footer text-center" >
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>			
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->


</body>
</html>
