<?php
/* @var $this TblZonaZipcodeController */
/* @var $model TblZonaZipcode */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-zona-zipcode-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_hiper_alcampo'); ?>
		<?php echo $form->textField($model,'id_hiper_alcampo'); ?>
		<?php echo $form->error($model,'id_hiper_alcampo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cp'); ?>
		<?php echo $form->textArea($model,'cp',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'cp'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->