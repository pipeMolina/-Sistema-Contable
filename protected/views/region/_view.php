<?php
/* @var $this RegionController */
/* @var $data Region */
?>

<div class="list-group">
<div  class="list-group-item">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_REGION')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_REGION), array('view', 'id'=>$data->ID_REGION)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE_REGION')); ?>:</b>
	<?php echo CHtml::encode($data->NOMBRE_REGION); ?>
	<br />


</div>
</div>