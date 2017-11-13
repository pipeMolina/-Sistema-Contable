<?php
/* @var $this LineaContableController */
/* @var $data LineaContable */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_LINEACONTABLE')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_LINEACONTABLE), array('view', 'id'=>$data->ID_LINEACONTABLE)); ?>
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