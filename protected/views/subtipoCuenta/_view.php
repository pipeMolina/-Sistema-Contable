<?php
/* @var $this SubtipoCuentaController */
/* @var $data SubtipoCuenta */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_SUBTIPOCUENTA')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_SUBTIPOCUENTA), array('view', 'id'=>$data->ID_SUBTIPOCUENTA)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_TIPOCUENTA')); ?>:</b>
	<?php echo CHtml::encode($data->ID_TIPOCUENTA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE_SUBTIPOCUENTA')); ?>:</b>
	<?php echo CHtml::encode($data->NOMBRE_SUBTIPOCUENTA); ?>
	<br />


</div>