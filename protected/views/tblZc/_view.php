<?php
/* @var $this TblZcController */
/* @var $data TblZc */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_zipcode')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cod_zipcode), array('view', 'id'=>$data->cod_zipcode)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_ini')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_ini); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_fin')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_fin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_alcampo')); ?>:</b>
	<?php echo CHtml::encode($data->id_alcampo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_zc')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_zc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cv')); ?>:</b>
	<?php echo CHtml::encode($data->cv); ?>
	<br />


</div>