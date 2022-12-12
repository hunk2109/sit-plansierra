<?php
/* @var $this TblMercadoController */
/* @var $model TblMercado */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-mercado-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_mercado'); ?>
		<?php echo $form->textField($model,'id_mercado'); ?>
		<?php echo $form->error($model,'id_mercado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desc_mercado'); ?>
		<?php echo $form->textArea($model,'desc_mercado',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'desc_mercado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_sector'); ?>
		<?php echo $form->textField($model,'id_sector'); ?>
		<?php echo $form->error($model,'id_sector'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->