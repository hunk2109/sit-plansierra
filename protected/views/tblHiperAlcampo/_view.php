<?php
/* @var $this TblHiperAlcampoController */
/* @var $data TblHiperAlcampo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_hiper_alcampo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_hiper_alcampo), array('view', 'id'=>$data->id_hiper_alcampo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_nielssen')); ?>:</b>
	<?php echo CHtml::encode($data->cod_nielssen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('region')); ?>:</b>
	<?php echo CHtml::encode($data->region); ?>
	<br />


</div>