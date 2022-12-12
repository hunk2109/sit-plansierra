<?php
/* @var $this GeoNielssenController */
/* @var $model GeoNielssen */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'geo-nielssen-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codigo_nielssen'); ?>
		<?php echo $form->textArea($model,'codigo_nielssen',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'codigo_nielssen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'grupo'); ?>
		<?php echo $form->textArea($model,'grupo',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'grupo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cadena'); ?>
		<?php echo $form->textArea($model,'cadena',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'cadena'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_rotulo'); ?>
		<?php echo $form->textField($model,'id_rotulo'); ?>
		<?php echo $form->error($model,'id_rotulo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'abrev'); ?>
		<?php echo $form->textArea($model,'abrev',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'abrev'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'direccion'); ?>
		<?php echo $form->textArea($model,'direccion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'direccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numero'); ?>
		<?php echo $form->textArea($model,'numero',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'numero'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'provincia'); ?>
		<?php echo $form->textArea($model,'provincia',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'provincia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'municipio'); ?>
		<?php echo $form->textArea($model,'municipio',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'municipio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cp'); ?>
		<?php echo $form->textArea($model,'cp',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'cp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cajas'); ?>
		<?php echo $form->textField($model,'cajas'); ?>
		<?php echo $form->error($model,'cajas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cajas_scan'); ?>
		<?php echo $form->textField($model,'cajas_scan'); ?>
		<?php echo $form->error($model,'cajas_scan'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sala_ventas'); ?>
		<?php echo $form->textField($model,'sala_ventas'); ?>
		<?php echo $form->error($model,'sala_ventas'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apertura'); ?>
		<?php echo $form->textField($model,'apertura'); ?>
		<?php echo $form->error($model,'apertura'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ccomercial'); ?>
		<?php echo $form->textArea($model,'ccomercial',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'ccomercial'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ccaa'); ?>
		<?php echo $form->textField($model,'ccaa'); ?>
		<?php echo $form->error($model,'ccaa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php echo $form->textField($model,'tipo'); ?>
		<?php echo $form->error($model,'tipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'geom'); ?>
		<?php echo $form->textField($model,'geom',array('size'=>0,'maxlength'=>0)); ?>
		<?php echo $form->error($model,'geom'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_baja'); ?>
		<?php echo $form->textField($model,'fecha_baja'); ?>
		<?php echo $form->error($model,'fecha_baja'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'geo_precision'); ?>
		<?php echo $form->textField($model,'geo_precision'); ?>
		<?php echo $form->error($model,'geo_precision'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->