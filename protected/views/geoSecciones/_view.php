<?php
/* @var $this GeoSeccionesController */
/* @var $data GeoSecciones */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('geom')); ?>:</b>
	<?php echo CHtml::encode($data->geom); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_secc')); ?>:</b>
	<?php echo CHtml::encode($data->cod_secc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_mun')); ?>:</b>
	<?php echo CHtml::encode($data->cod_mun); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pob_0005')); ?>:</b>
	<?php echo CHtml::encode($data->pob_0005); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pob_0514')); ?>:</b>
	<?php echo CHtml::encode($data->pob_0514); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pob_1519')); ?>:</b>
	<?php echo CHtml::encode($data->pob_1519); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('pob_2029')); ?>:</b>
	<?php echo CHtml::encode($data->pob_2029); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pob_2965')); ?>:</b>
	<?php echo CHtml::encode($data->pob_2965); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pob_6599')); ?>:</b>
	<?php echo CHtml::encode($data->pob_6599); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pobex_afric')); ?>:</b>
	<?php echo CHtml::encode($data->pobex_afric); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pobex_ameri')); ?>:</b>
	<?php echo CHtml::encode($data->pobex_ameri); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pobex_asiat')); ?>:</b>
	<?php echo CHtml::encode($data->pobex_asiat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pobex_europ')); ?>:</b>
	<?php echo CHtml::encode($data->pobex_europ); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pobex_resto')); ?>:</b>
	<?php echo CHtml::encode($data->pobex_resto); ?>
	<br />

	*/ ?>

</div>