<?php
/* @var $this PersonaController */
/* @var $data Persona */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('RUT_PERSONA')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->RUT_PERSONA), array('view', 'id'=>$data->RUT_PERSONA)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE_PERSONA')); ?>:</b>
	<?php echo CHtml::encode($data->NOMBRE_PERSONA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('APELLIDO_PERSONA')); ?>:</b>
	<?php echo CHtml::encode($data->APELLIDO_PERSONA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TELEFONO_PERSONA')); ?>:</b>
	<?php echo CHtml::encode($data->TELEFONO_PERSONA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CORREO_PERSONA')); ?>:</b>
	<?php echo CHtml::encode($data->CORREO_PERSONA); ?>
	<br />


</div>