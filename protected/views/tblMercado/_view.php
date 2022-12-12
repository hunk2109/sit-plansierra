<?php
/* @var $this TblMercadoController */
/* @var $data TblMercado */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_mercado')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_mercado), array('view', 'id'=>$data->id_mercado)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc_mercado')); ?>:</b>
	<?php echo CHtml::encode($data->desc_mercado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_sector')); ?>:</b>
	<?php echo CHtml::encode($data->id_sector); ?>
	<br />


</div>