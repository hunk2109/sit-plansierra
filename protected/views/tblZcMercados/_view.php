<?php
/* @var $this TblZcMercadosController */
/* @var $data TblZcMercados */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_zipcode')); ?>:</b>
	<?php echo CHtml::encode($data->cod_zipcode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_mercado')); ?>:</b>
	<?php echo CHtml::encode($data->id_mercado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cp')); ?>:</b>
	<?php echo CHtml::encode($data->cp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('venta_si')); ?>:</b>
	<?php echo CHtml::encode($data->venta_si); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('venta_no')); ?>:</b>
	<?php echo CHtml::encode($data->venta_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('venta_ns')); ?>:</b>
	<?php echo CHtml::encode($data->venta_ns); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('folleto_si')); ?>:</b>
	<?php echo CHtml::encode($data->folleto_si); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('folleto_no')); ?>:</b>
	<?php echo CHtml::encode($data->folleto_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('folleto_ns')); ?>:</b>
	<?php echo CHtml::encode($data->folleto_ns); ?>
	<br />

	*/ ?>

</div>