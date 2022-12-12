<?php
/* @var $this TblRotuloController */
/* @var $data TblRotulo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_rotulo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_rotulo), array('view', 'id'=>$data->id_rotulo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rotulo')); ?>:</b>
	<?php echo CHtml::encode($data->rotulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('logo')); ?>:</b>
	<?php echo CHtml::encode($data->logo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_etiqueta')); ?>:</b>
	<?php echo CHtml::encode($data->id_etiqueta); ?>
	<br />


</div>