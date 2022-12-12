<?php
/* @var $this TblAuxExtranjerosController */
/* @var $data TblAuxExtranjeros */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_nacionalidad')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_nacionalidad), array('view', 'id'=>$data->id_nacionalidad)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc_nacionalidad')); ?>:</b>
	<?php echo CHtml::encode($data->desc_nacionalidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grupo')); ?>:</b>
	<?php echo CHtml::encode($data->grupo); ?>
	<br />


</div>