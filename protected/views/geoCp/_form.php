<?php
/* @var $this GeoCpController */
/* @var $model GeoCp */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'geo-cp-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cp'); ?>
		<?php echo $form->textArea($model,'cp',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'cp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sum_pob'); ?>
		<?php echo $form->textField($model,'sum_pob'); ?>
		<?php echo $form->error($model,'sum_pob'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'geom'); ?>
		<?php echo $form->textField($model,'geom',array('size'=>0,'maxlength'=>0)); ?>
		<?php echo $form->error($model,'geom'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->