<?php
/* @var $this TblZipcodeController */
/* @var $model TblZipcode */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-zipcode-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_encuesta_zc'); ?>
		<?php echo $form->textField($model,'id_encuesta_zc'); ?>
		<?php echo $form->error($model,'id_encuesta_zc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cp'); ?>
		<?php echo $form->textArea($model,'cp',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'cp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cv_porc'); ?>
		<?php echo $form->textField($model,'cv_porc'); ?>
		<?php echo $form->error($model,'cv_porc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'caddy'); ?>
		<?php echo $form->textField($model,'caddy'); ?>
		<?php echo $form->error($model,'caddy'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pasos'); ?>
		<?php echo $form->textField($model,'pasos'); ?>
		<?php echo $form->error($model,'pasos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'folleto'); ?>
		<?php echo $form->textField($model,'folleto'); ?>
		<?php echo $form->error($model,'folleto'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->