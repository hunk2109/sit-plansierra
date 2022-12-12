<?php
/* @var $this UsersController */
/* @var $data Users */
?>

<div class="viewmain">

	<b><h5><?php echo CHtml::encode($data->getAttributeLabel('Id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<?php echo (''); ?>
<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
		<?php echo (''); ?>
<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('grupo')); ?>:</b>
	<?php echo CHtml::encode($data->grupo); ?>
	<br />
<br />
</div>