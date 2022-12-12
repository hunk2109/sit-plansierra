<?php
/* @var $this GeoZonaInfluenciaController */
/* @var $model GeoZonaInfluencia */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'geo-zona-influencia-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'loc'); ?>
		<?php echo $form->textField($model,'loc',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'loc'); ?>
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