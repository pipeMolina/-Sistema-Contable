<?php
/* @var $this ComprobanteContableController */
/* @var $data ComprobanteContable */
?>

<div class="list-group">
	<div  class="list-group-item">

		<b><?php echo CHtml::encode($data->getAttributeLabel('NUMERO_COMPROBANTE')); ?>:</b>
		<?php echo CHtml::link(CHtml::encode($data->NUMERO_COMPROBANTE), array('view', 'id'=>$data->NUMERO_COMPROBANTE)); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('ID_TIPOCOMP')); ?>:</b>
		<?php echo CHtml::encode($data->iDTIPOCOMP->NOMBRE_TIPOCOMP); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('RUT_EMPRESA')); ?>:</b>
		<?php echo CHtml::encode($data->RUT_EMPRESA); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('FECHA_COMPROBANTE')); ?>:</b>
		<?php echo CHtml::encode($data->FECHA_COMPROBANTE); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('GLOSA_COMPROBANTE')); ?>:</b>
		<?php echo CHtml::encode($data->GLOSA_COMPROBANTE); ?>
	<br />

	</div>
</div>