<?php
/* @var $this GeoNielssenController */
/* @var $model GeoNielssen */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'codigo_nielssen'); ?>
		<?php echo $form->textArea($model,'codigo_nielssen',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'grupo'); ?>
		<?php echo $form->textArea($model,'grupo',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cadena'); ?>
		<?php echo $form->textArea($model,'cadena',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_rotulo'); ?>
		<?php echo $form->textField($model,'id_rotulo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'abrev'); ?>
		<?php echo $form->textArea($model,'abrev',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'direccion'); ?>
		<?php echo $form->textArea($model,'direccion',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numero'); ?>
		<?php echo $form->textArea($model,'numero',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'provincia'); ?>
		<?php echo $form->textArea($model,'provincia',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'municipio'); ?>
		<?php echo $form->textArea($model,'municipio',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cp'); ?>
		<?php echo $form->textArea($model,'cp',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cajas'); ?>
		<?php echo $form->textField($model,'cajas'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cajas_scan'); ?>
		<?php echo $form->textField($model,'cajas_scan'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sala_ventas'); ?>
		<?php echo $form->textField($model,'sala_ventas'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'apertura'); ?>
		<?php echo $form->textField($model,'apertura'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ccomercial'); ?>
		<?php echo $form->textArea($model,'ccomercial',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ccaa'); ?>
		<?php echo $form->textField($model,'ccaa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo'); ?>
		<?php echo $form->textField($model,'tipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'geom'); ?>
		<?php echo $form->textField($model,'geom',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_baja'); ?>
		<?php echo $form->textField($model,'fecha_baja'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'geo_precision'); ?>
		<?php echo $form->textField($model,'geo_precision'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->