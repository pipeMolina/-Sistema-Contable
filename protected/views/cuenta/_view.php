<?php
/* @var $this CuentaController */
/* @var $data Cuenta */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_CUENTA')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_CUENTA), array('view', 'id'=>$data->ID_CUENTA)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_TIPOCUENTA')); ?>:</b>
	<?php echo CHtml::encode($data->ID_TIPOCUENTA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_PLANCUENTA')); ?>:</b>
	<?php echo CHtml::encode($data->ID_PLANCUENTA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_SUBTIPOCUENTA')); ?>:</b>
	<?php echo CHtml::encode($data->ID_SUBTIPOCUENTA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DESCRIPCION_CUENTA')); ?>:</b>
	<?php echo CHtml::encode($data->DESCRIPCION_CUENTA); ?>
	<br />


</div>