<?php
/* @var $this TblIsoPobController */
/* @var $model TblIsoPob */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-iso-pob-form',
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
		<?php echo $form->labelEx($model,'secc'); ?>
		<?php echo $form->textArea($model,'secc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'secc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p1'); ?>
		<?php echo $form->textField($model,'p1'); ?>
		<?php echo $form->error($model,'p1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p2'); ?>
		<?php echo $form->textField($model,'p2'); ?>
		<?php echo $form->error($model,'p2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p3'); ?>
		<?php echo $form->textField($model,'p3'); ?>
		<?php echo $form->error($model,'p3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p4'); ?>
		<?php echo $form->textField($model,'p4'); ?>
		<?php echo $form->error($model,'p4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p5'); ?>
		<?php echo $form->textField($model,'p5'); ?>
		<?php echo $form->error($model,'p5'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_secc'); ?>
		<?php echo $form->textField($model,'p_secc'); ?>
		<?php echo $form->error($model,'p_secc'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->