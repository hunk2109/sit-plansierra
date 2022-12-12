<?php
/* @var $this TblAuxExtranjerosController */
/* @var $model TblAuxExtranjeros */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-aux-extranjeros-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_nacionalidad'); ?>
		<?php echo $form->textField($model,'id_nacionalidad'); ?>
		<?php echo $form->error($model,'id_nacionalidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desc_nacionalidad'); ?>
		<?php echo $form->textArea($model,'desc_nacionalidad',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'desc_nacionalidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo'); ?>
		<?php echo $form->textField($model,'tipo'); ?>
		<?php echo $form->error($model,'tipo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'grupo'); ?>
		<?php echo $form->textField($model,'grupo'); ?>
		<?php echo $form->error($model,'grupo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->