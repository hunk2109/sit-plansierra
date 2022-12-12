<?php
/* @var $this TblZipcodeController */
/* @var $data TblZipcode */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_consulta_por_cp')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_consulta_por_cp), array('view', 'id'=>$data->id_consulta_por_cp)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_encuesta_zc')); ?>:</b>
	<?php echo CHtml::encode($data->id_encuesta_zc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cp')); ?>:</b>
	<?php echo CHtml::encode($data->cp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cv')); ?>:</b>
	<?php echo CHtml::encode($data->cv); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('caddy')); ?>:</b>
	<?php echo CHtml::encode($data->caddy); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pasos')); ?>:</b>
	<?php echo CHtml::encode($data->pasos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('folleto')); ?>:</b>
	<?php echo CHtml::encode($data->folleto); ?>
	<br />


</div>