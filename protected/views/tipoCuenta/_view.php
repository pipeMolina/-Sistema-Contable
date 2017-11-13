<?php
/* @var $this TipoCuentaController */
/* @var $data TipoCuenta */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_TIPOCUENTA')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_TIPOCUENTA), array('view', 'id'=>$data->ID_TIPOCUENTA)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE_TIPOCUENTA')); ?>:</b>
	<?php echo CHtml::encode($data->NOMBRE_TIPOCUENTA); ?>
	<br />


</div>