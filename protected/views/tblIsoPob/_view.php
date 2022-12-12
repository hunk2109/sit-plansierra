<?php
/* @var $this TblIsoPobController */
/* @var $data TblIsoPob */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_encuesta_zc')); ?>:</b>
	<?php echo CHtml::encode($data->id_encuesta_zc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('secc')); ?>:</b>
	<?php echo CHtml::encode($data->secc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p1')); ?>:</b>
	<?php echo CHtml::encode($data->p1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p2')); ?>:</b>
	<?php echo CHtml::encode($data->p2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p3')); ?>:</b>
	<?php echo CHtml::encode($data->p3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p4')); ?>:</b>
	<?php echo CHtml::encode($data->p4); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('p5')); ?>:</b>
	<?php echo CHtml::encode($data->p5); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_secc')); ?>:</b>
	<?php echo CHtml::encode($data->p_secc); ?>
	<br />

	*/ ?>

</div>