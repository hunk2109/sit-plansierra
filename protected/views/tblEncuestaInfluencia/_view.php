<?php
/* @var $this TblEncuestaInfluenciaController */
/* @var $data TblEncuestaInfluencia */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_encuesta')); ?>:</b>
	<?php echo CHtml::encode($data->id_encuesta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('registro_encuesta')); ?>:</b>
	<?php echo CHtml::encode($data->registro_encuesta); ?>
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

	<b><?php echo CHtml::encode($data->getAttributeLabel('cp')); ?>:</b>
	<?php echo CHtml::encode($data->cp); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('loc_mkt')); ?>:</b>
	<?php echo CHtml::encode($data->loc_mkt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ponderacion')); ?>:</b>
	<?php echo CHtml::encode($data->ponderacion); ?>
	<br />

	*/ ?>

</div>