<?php
/* @var $this CiudadController */
/* @var $data Ciudad */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_CIUDAD')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_CIUDAD), array('view', 'id'=>$data->ID_CIUDAD)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_REGION')); ?>:</b>
	<?php echo CHtml::encode($data->ID_REGION); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE_CIUDAD')); ?>:</b>
	<?php echo CHtml::encode($data->NOMBRE_CIUDAD); ?>
	<br />


</div>