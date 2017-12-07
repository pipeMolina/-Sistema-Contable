<?php
/* @var $this CuentaController */
/* @var $data Cuenta */
?>
<div class="list-group">
<div  class="list-group-item">
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_CUENTA')); ?>
	<?php echo CHtml::link(CHtml::encode($data->ID_CUENTA), array('view', 'id'=>$data->ID_CUENTA)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_TIPOCUENTA')); ?>:</b>
	<?php echo CHtml::encode($data->iDTIPOCUENTA->NOMBRE_TIPOCUENTA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_PLANCUENTA')); ?>:</b>
	<?php echo CHtml::encode($data->iDPLANCUENTA->DESCRIPCION_PLANCUENTA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_SUBTIPOCUENTA')); ?>:</b>
	<?php echo CHtml::encode($data->iDSUBTIPOCUENTA->NOMBRE_SUBTIPOCUENTA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DESCRIPCION_CUENTA')); ?>:</b>
	<?php echo CHtml::encode($data->DESCRIPCION_CUENTA); ?>
	<br />
</div>

</div>