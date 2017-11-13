<?php
/* @var $this AsientoContableController */
/* @var $data AsientoContable */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_ASIENTOCONTABLE')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_ASIENTOCONTABLE), array('view', 'id'=>$data->ID_ASIENTOCONTABLE)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NUMERO_COMPROBANTE')); ?>:</b>
	<?php echo CHtml::encode($data->NUMERO_COMPROBANTE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DEBE')); ?>:</b>
	<?php echo CHtml::encode($data->DEBE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HABER')); ?>:</b>
	<?php echo CHtml::encode($data->HABER); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CUENTA')); ?>:</b>
	<?php echo CHtml::encode($data->CUENTA); ?>
	<br />


</div>