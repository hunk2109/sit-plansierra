<?php
/* @var $this TblIdEncuestaZcController */
/* @var $data TblIdEncuestaZc */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_encuesta_zc')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_encuesta_zc), array('view', 'id'=>$data->id_encuesta_zc)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_ini')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_ini); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_fin')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_fin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_hiper_alcampo')); ?>:</b>
	<?php echo CHtml::encode($data->id_hiper_alcampo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_zc')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_zc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cv')); ?>:</b>
	<?php echo CHtml::encode($data->cv); ?>
	<br />


</div>