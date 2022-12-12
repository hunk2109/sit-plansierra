<?php
/* @var $this TblEncuestaInfluenciaController */
/* @var $model TblEncuestaInfluencia */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-encuesta-influencia-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_encuesta'); ?>
		<?php echo $form->textField($model,'id_encuesta'); ?>
		<?php echo $form->error($model,'id_encuesta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'registro_encuesta'); ?>
		<?php echo $form->textField($model,'registro_encuesta'); ?>
		<?php echo $form->error($model,'registro_encuesta'); ?>
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
		<?php echo $form->labelEx($model,'cp'); ?>
		<?php echo $form->textArea($model,'cp',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'cp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'loc_mkt'); ?>
		<?php echo $form->textArea($model,'loc_mkt',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'loc_mkt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ponderacion'); ?>
		<?php echo $form->textField($model,'ponderacion'); ?>
		<?php echo $form->error($model,'ponderacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->