<?php
/* @var $this TblClClientesController */
/* @var $data TblClClientes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cp')); ?>:</b>
	<?php echo CHtml::encode($data->cp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_edad')); ?>:</b>
	<?php echo CHtml::encode($data->cod_edad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_clientes')); ?>:</b>
	<?php echo CHtml::encode($data->num_clientes); ?>
	<br />


</div>