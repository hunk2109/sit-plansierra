<?php
/* @var $this TblIsoCvController */
/* @var $data TblIsoCv */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_iso_cv_zc')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_iso_cv_zc), array('view', 'id'=>$data->id_iso_cv_zc)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_encuesta_zc')); ?>:</b>
	<?php echo CHtml::encode($data->id_encuesta_zc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iso')); ?>:</b>
	<?php echo CHtml::encode($data->iso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cv')); ?>:</b>
	<?php echo CHtml::encode($data->cv); ?>
	<br />


</div>