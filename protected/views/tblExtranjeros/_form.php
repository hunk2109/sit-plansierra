<?php
/* @var $this TblExtranjerosController */
/* @var $model TblExtranjeros */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-extranjeros-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'seccion'); ?>
		<?php echo $form->textArea($model,'seccion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'seccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nacionalidad'); ?>
		<?php echo $form->textField($model,'nacionalidad'); ?>
		<?php echo $form->error($model,'nacionalidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'poblacion'); ?>
		<?php echo $form->textField($model,'poblacion'); ?>
		<?php echo $form->error($model,'poblacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->