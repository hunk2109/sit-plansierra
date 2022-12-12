<?php
/* @var $this TblZonaInfluenciaController */
/* @var $model TblZonaInfluencia */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-zona-influencia-form',
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
		<?php echo $form->labelEx($model,'id_tipo_zi'); ?>
		<?php echo $form->textField($model,'id_tipo_zi'); ?>
		<?php echo $form->error($model,'id_tipo_zi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'loc'); ?>
		<?php echo $form->textArea($model,'loc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'loc'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->