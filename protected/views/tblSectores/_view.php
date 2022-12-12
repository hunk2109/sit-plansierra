<?php
/* @var $this TblSectoresController */
/* @var $data TblSectores */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_sector')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_sector), array('view', 'id'=>$data->id_sector)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc_sector')); ?>:</b>
	<?php echo CHtml::encode($data->desc_sector); ?>
	<br />


</div>