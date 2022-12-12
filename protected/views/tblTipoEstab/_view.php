<?php
/* @var $this TblTipoEstabController */
/* @var $data TblTipoEstab */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tipo), array('view', 'id'=>$data->tipo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc')); ?>:</b>
	<?php echo CHtml::encode($data->desc); ?>
	<br />


</div>