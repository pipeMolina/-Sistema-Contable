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

<table class="table table-striped table-hover ">
  <thead>
    <tr>
      <th>Codigo</th>
      <th>Nombre Plan de cuentas</th>
    </tr>
  </thead>
  <tbody>
    <tr class="info">
      <td><?php echo CHtml::link(CHtml::encode($data->ID_PLANCUENTA), array('view', 'id'=>$data->ID_PLANCUENTA)); ?></td>
      <td><?php echo CHtml::encode($data->DESCRIPCION_PLANCUENTA); ?></td>
    </tr>
  </tbody>
</table> 
<br></br>