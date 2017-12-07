<?php
/* @var $this PlanCuentaController */
/* @var $data PlanCuenta */
?>

<!--<div class="view">

	<b><?php //echo CHtml::encode($data->getAttributeLabel('ID_PLANCUENTA')); ?>:</b>
	<?php //echo CHtml::link(CHtml::encode($data->ID_PLANCUENTA), array('view', 'id'=>$data->ID_PLANCUENTA)); ?>
	<br />

	<b><?php //echo CHtml::encode($data->getAttributeLabel('DESCRIPCION_PLANCUENTA')); ?>:</b>
	<?php //echo CHtml::encode($data->DESCRIPCION_PLANCUENTA); ?>
	<br />


</div>-->

 <div class="list-group">
    <div  class="list-group-item">
      <b><?php echo CHtml::encode($data->getAttributeLabel('ID_PLANCUENTA')); ?>
        <?php echo CHtml::link(CHtml::encode($data->ID_PLANCUENTA), array('view', 'id'=>$data->ID_PLANCUENTA)); ?></td>
      <br />

      <b><?php echo CHtml::encode($data->getAttributeLabel('DESCRIPCION_PLANCUENTA')); ?>
        <?php echo CHtml::encode($data->DESCRIPCION_PLANCUENTA); ?>
      <br />
    </div>
  </div>