<?php
/* @var $this AccionesController */
/* @var $model Acciones */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'acciones-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'grupo'); ?>
		<?php echo $form->textField($model,'grupo',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'grupo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'accion'); ?>
		<?php echo $form->textField($model,'accion',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'accion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->