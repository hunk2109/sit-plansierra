<?php
/* @var $this TblEcomController */
/* @var $data TblEcom */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_hiper')); ?>:</b>
	<?php echo CHtml::encode($data->id_hiper); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cp')); ?>:</b>
	<?php echo CHtml::encode($data->cp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cv')); ?>:</b>
	<?php echo CHtml::encode($data->cv); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_entrega')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_entrega); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_pedidos')); ?>:</b>
	<?php echo CHtml::encode($data->num_pedidos); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('clientes_unicos')); ?>:</b>
	<?php echo CHtml::encode($data->clientes_unicos); ?>
	<br />

	*/ ?>

</div>