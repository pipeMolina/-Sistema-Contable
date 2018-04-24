<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="row-fluid">
<div class="col-lg-3">
	<div class="nav sidebar-nav">
	<?php
		$this->widget('zii.widgets.CMenu', array(
			'items'=>array(
				array('label'=>'Operaciones',
					'items'=>$this->menu),
				),
		));
				
	?>
	</div><!-- sidebar -->
</div>
<div class="col-lg-9">
	<div id="content">
		<?php echo $content; ?>
	</div><!-- content -->
</div>
</div>
<?php $this->endContent(); ?>