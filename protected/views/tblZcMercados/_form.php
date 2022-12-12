<?php
/* @var $this TblZcMercadosController */
/* @var $model TblZcMercados */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-zc-mercados-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cod_zipcode'); ?>
		<?php echo $form->textField($model,'cod_zipcode'); ?>
		<?php echo $form->error($model,'cod_zipcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_mercado'); ?>
		<?php echo $form->textField($model,'id_mercado'); ?>
		<?php echo $form->error($model,'id_mercado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cp'); ?>
		<?php echo $form->textArea($model,'cp',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'cp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'venta_si'); ?>
		<?php echo $form->textField($model,'venta_si'); ?>
		<?php echo $form->error($model,'venta_si'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'venta_no'); ?>
		<?php echo $form->textField($model,'venta_no'); ?>
		<?php echo $form->error($model,'venta_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'venta_ns'); ?>
		<?php echo $form->textField($model,'venta_ns'); ?>
		<?php echo $form->error($model,'venta_ns'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'folleto_si'); ?>
		<?php echo $form->textField($model,'folleto_si'); ?>
		<?php echo $form->error($model,'folleto_si'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'folleto_no'); ?>
		<?php echo $form->textField($model,'folleto_no'); ?>
		<?php echo $form->error($model,'folleto_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'folleto_ns'); ?>
		<?php echo $form->textField($model,'folleto_ns'); ?>
		<?php echo $form->error($model,'folleto_ns'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->