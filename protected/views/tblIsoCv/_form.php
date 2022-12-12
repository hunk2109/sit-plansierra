<?php
/* @var $this TblIsoCvController */
/* @var $model TblIsoCv */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-iso-cv-form',
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
		<?php echo $form->labelEx($model,'iso'); ?>
		<?php echo $form->textField($model,'iso'); ?>
		<?php echo $form->error($model,'iso'); ?>
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