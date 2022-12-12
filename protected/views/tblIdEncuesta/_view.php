<?php
/* @var $this TblIdEncuestaController */
/* @var $data TblIdEncuesta */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_encuesta')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_encuesta), array('view', 'id'=>$data->id_encuesta)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_encuesta')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_encuesta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_alcampo')); ?>:</b>
	<?php echo CHtml::encode($data->id_alcampo); ?>
	<br />


</div>