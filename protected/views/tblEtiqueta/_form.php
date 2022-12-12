<?php
/* @var $this TblEtiquetaController */
/* @var $model TblEtiqueta */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-etiqueta-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_etiqueta'); ?>
		<?php echo $form->textField($model,'id_etiqueta'); ?>
		<?php echo $form->error($model,'id_etiqueta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'etiqueta'); ?>
		<?php echo $form->textArea($model,'etiqueta',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'etiqueta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'logo'); ?>
		<?php echo $form->textArea($model,'logo',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'logo'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->