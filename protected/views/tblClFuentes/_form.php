<?php
/* @var $this TblClFuentesController */
/* @var $model TblClFuentes */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-cl-fuentes-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cod_fuente'); ?>
		<?php echo $form->textField($model,'cod_fuente'); ?>
		<?php echo $form->error($model,'cod_fuente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desc_fuente'); ?>
		<?php echo $form->textArea($model,'desc_fuente',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'desc_fuente'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->