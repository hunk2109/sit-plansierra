<?php
/* @var $this TblIsoDescController */
/* @var $data TblIsoDesc */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_iso')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_iso), array('view', 'id'=>$data->id_iso)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iso_nom')); ?>:</b>
	<?php echo CHtml::encode($data->iso_nom); ?>
	<br />


</div>