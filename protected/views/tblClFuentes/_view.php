<?php
/* @var $this TblClFuentesController */
/* @var $data TblClFuentes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_fuente')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cod_fuente), array('view', 'id'=>$data->cod_fuente)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc_fuente')); ?>:</b>
	<?php echo CHtml::encode($data->desc_fuente); ?>
	<br />


</div>