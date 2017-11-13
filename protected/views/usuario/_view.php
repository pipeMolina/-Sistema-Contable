<?php
/* @var $this UsuarioController */
/* @var $data Usuario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('RUT_PERSONA')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->RUT_PERSONA), array('view', 'id'=>$data->RUT_PERSONA)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_TIPOUSUARIO')); ?>:</b>
	<?php echo CHtml::encode($data->ID_TIPOUSUARIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LOGIN_USUARIO')); ?>:</b>
	<?php echo CHtml::encode($data->LOGIN_USUARIO); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PASS_USUARIO')); ?>:</b>
	<?php echo CHtml::encode($data->PASS_USUARIO); ?>
	<br />


</div>