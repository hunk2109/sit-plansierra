<?php
/* @var $this TblIdEncuestaZcController */
/* @var $model TblIdEncuestaZc */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-id-encuesta-zc-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_ini'); ?>
		<?php echo $form->textField($model,'fecha_ini'); ?>
		<?php echo $form->error($model,'fecha_ini'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_fin'); ?>
		<?php echo $form->textField($model,'fecha_fin'); ?>
		<?php echo $form->error($model,'fecha_fin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_hiper_alcampo'); ?>
		<?php echo $form->textField($model,'id_hiper_alcampo'); ?>
		<?php echo $form->error($model,'id_hiper_alcampo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_zc'); ?>
		<?php echo $form->textField($model,'tipo_zc'); ?>
		<?php echo $form->error($model,'tipo_zc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cv'); ?>
		<?php echo $form->textField($model,'cv'); ?>
		<?php echo $form->error($model,'cv'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->