<?php
/* @var $this TblZipcodeMercadosController */
/* @var $data TblZipcodeMercados */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_consulta_en_cp')); ?>:</b>
	<?php echo CHtml::encode($data->id_consulta_en_cp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_mercado')); ?>:</b>
	<?php echo CHtml::encode($data->id_mercado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cv')); ?>:</b>
	<?php echo CHtml::encode($data->cv); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('caddy')); ?>:</b>
	<?php echo CHtml::encode($data->caddy); ?>
	<br />


</div>