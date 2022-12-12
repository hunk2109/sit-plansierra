<?php
/* @var $this TblHiperAlcampoController */
/* @var $model TblHiperAlcampo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-hiper-alcampo-form',
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
		<?php echo $form->labelEx($model,'cod_nielssen'); ?>
		<?php echo $form->textArea($model,'cod_nielssen',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'cod_nielssen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textArea($model,'nombre',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'region'); ?>
		<?php echo $form->textField($model,'region'); ?>
		<?php echo $form->error($model,'region'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->