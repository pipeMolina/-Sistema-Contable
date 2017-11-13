<?php
/* @var $this TipoComprobanteController */
/* @var $data TipoComprobante */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_TIPOCOMP')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_TIPOCOMP), array('view', 'id'=>$data->ID_TIPOCOMP)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE_TIPOCOMP')); ?>:</b>
	<?php echo CHtml::encode($data->NOMBRE_TIPOCOMP); ?>
	<br />


</div>