<?php
/* @var $this TblZonaInfluenciaController */
/* @var $data TblZonaInfluencia */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_hiper_alcampo')); ?>:</b>
	<?php echo CHtml::encode($data->id_hiper_alcampo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_zi')); ?>:</b>
	<?php echo CHtml::encode($data->id_tipo_zi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('loc')); ?>:</b>
	<?php echo CHtml::encode($data->loc); ?>
	<br />


</div>