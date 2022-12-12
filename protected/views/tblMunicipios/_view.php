<?php
/* @var $this TblMunicipiosController */
/* @var $data TblMunicipios */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_mun')); ?>:</b>
	<?php echo CHtml::encode($data->cod_mun); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc_mun')); ?>:</b>
	<?php echo CHtml::encode($data->desc_mun); ?>
	<br />


</div>