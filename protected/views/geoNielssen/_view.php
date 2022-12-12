<?php
/* @var $this GeoNielssenController */
/* @var $data GeoNielssen */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('codigo_nielssen')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->codigo_nielssen), array('view', 'id'=>$data->codigo_nielssen)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grupo')); ?>:</b>
	<?php echo CHtml::encode($data->grupo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cadena')); ?>:</b>
	<?php echo CHtml::encode($data->cadena); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_rotulo')); ?>:</b>
	<?php echo CHtml::encode($data->id_rotulo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('abrev')); ?>:</b>
	<?php echo CHtml::encode($data->abrev); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>:</b>
	<?php echo CHtml::encode($data->direccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero')); ?>:</b>
	<?php echo CHtml::encode($data->numero); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('provincia')); ?>:</b>
	<?php echo CHtml::encode($data->provincia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('municipio')); ?>:</b>
	<?php echo CHtml::encode($data->municipio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cp')); ?>:</b>
	<?php echo CHtml::encode($data->cp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cajas')); ?>:</b>
	<?php echo CHtml::encode($data->cajas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cajas_scan')); ?>:</b>
	<?php echo CHtml::encode($data->cajas_scan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sala_ventas')); ?>:</b>
	<?php echo CHtml::encode($data->sala_ventas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apertura')); ?>:</b>
	<?php echo CHtml::encode($data->apertura); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ccomercial')); ?>:</b>
	<?php echo CHtml::encode($data->ccomercial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ccaa')); ?>:</b>
	<?php echo CHtml::encode($data->ccaa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo')); ?>:</b>
	<?php echo CHtml::encode($data->tipo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('geom')); ?>:</b>
	<?php echo CHtml::encode($data->geom); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_baja')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_baja); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('geo_precision')); ?>:</b>
	<?php echo CHtml::encode($data->geo_precision); ?>
	<br />

	*/ ?>

</div>