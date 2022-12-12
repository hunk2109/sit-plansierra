<?php
/* @var $this GeoZonaInfluenciaController */
/* @var $data GeoZonaInfluencia */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('gid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->gid), array('view', 'id'=>$data->gid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('loc')); ?>:</b>
	<?php echo CHtml::encode($data->loc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('geom')); ?>:</b>
	<?php echo CHtml::encode($data->geom); ?>
	<br />


</div>