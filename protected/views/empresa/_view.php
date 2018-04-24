<?php
/* @var $this EmpresaController */
/* @var $data Empresa */
?>

<div class="list-group">
<div  class="list-group-item">

	<b><?php echo CHtml::encode($data->getAttributeLabel('RUT_EMPRESA')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->RUT_EMPRESA), array('view', 'id'=>$data->RUT_EMPRESA)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RAZONSOCIAL_EMPRESA')); ?>:</b>
	<?php echo CHtml::encode($data->RAZONSOCIAL_EMPRESA); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('GIRO_EMPRESA')); ?>:</b>
	<?php echo CHtml::encode($data->GIRO_EMPRESA); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_PLANCUENTA')); ?>:</b>
	<?php echo CHtml::encode($data->iDPLANCUENTA->DESCRIPCION_PLANCUENTA); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_CIUDAD')); ?>:</b>
	<?php echo CHtml::encode($data->iDCIUDAD->NOMBRE_CIUDAD); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('CORREO')); ?>:</b>
	<?php echo CHtml::encode($data->CORREO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TELEFONO_EMPRESA')); ?>:</b>
	<?php echo CHtml::encode($data->TELEFONO_EMPRESA); ?>
	<br />

</div>
</div>