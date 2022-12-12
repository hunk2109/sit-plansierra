<?php
/* @var $this TblEtiquetaController */
/* @var $data TblEtiqueta */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_etiqueta')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_etiqueta), array('view', 'id'=>$data->id_etiqueta)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('etiqueta')); ?>:</b>
	<?php echo CHtml::encode($data->etiqueta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('logo')); ?>:</b>
	<?php echo CHtml::encode($data->logo); ?>
	<br />


</div>