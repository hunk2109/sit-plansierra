<?php
/* @var $this TblIdEncuestaController */
/* @var $model TblIdEncuesta */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-id-encuesta-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_encuesta'); ?>
		<?php echo $form->textField($model,'fecha_encuesta'); ?>
		<?php echo $form->error($model,'fecha_encuesta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_alcampo'); ?>
		<?php echo $form->textField($model,'id_alcampo'); ?>
		<?php echo $form->error($model,'id_alcampo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->