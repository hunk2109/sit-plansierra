<?php
/* @var $this GeoIsopolygonController */
/* @var $model GeoIsopolygon */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'geo-isopolygon-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'iso'); ?>
		<?php echo $form->textField($model,'iso'); ?>
		<?php echo $form->error($model,'iso'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_hiper'); ?>
		<?php echo $form->textField($model,'id_hiper'); ?>
		<?php echo $form->error($model,'id_hiper'); ?>
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