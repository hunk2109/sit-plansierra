<?php
/* @var $this TblHogaresController */
/* @var $data TblHogares */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cpro')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cpro), array('view', 'id'=>$data->cpro)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('personas')); ?>:</b>
	<?php echo CHtml::encode($data->personas); ?>
	<br />


</div>