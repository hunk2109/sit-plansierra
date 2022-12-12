<?php
/* @var $this GeoIsopolygonController */
/* @var $data GeoIsopolygon */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('gid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->gid), array('view', 'id'=>$data->gid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('iso')); ?>:</b>
	<?php echo CHtml::encode($data->iso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_hiper')); ?>:</b>
	<?php echo CHtml::encode($data->id_hiper); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('geom')); ?>:</b>
	<?php echo CHtml::encode($data->geom); ?>
	<br />


</div>