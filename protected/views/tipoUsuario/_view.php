<?php
/* @var $this TipoUsuarioController */
/* @var $data TipoUsuario */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID_TIPOUSUARIO')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID_TIPOUSUARIO), array('view', 'id'=>$data->ID_TIPOUSUARIO)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NOMBRE_TIPOSUARIO')); ?>:</b>
	<?php echo CHtml::encode($data->NOMBRE_TIPOSUARIO); ?>
	<br />


</div>