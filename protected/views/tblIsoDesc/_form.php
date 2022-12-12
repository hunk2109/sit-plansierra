<?php
/* @var $this TblIsoDescController */
/* @var $model TblIsoDesc */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-iso-desc-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'iso_nom'); ?>
		<?php echo $form->textArea($model,'iso_nom',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'iso_nom'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->