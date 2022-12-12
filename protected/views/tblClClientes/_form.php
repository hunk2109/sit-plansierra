<?php
/* @var $this TblClClientesController */
/* @var $model TblClClientes */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-cl-clientes-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
		<?php echo $form->error($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cp'); ?>
		<?php echo $form->textField($model,'cp',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'cp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cod_edad'); ?>
		<?php echo $form->textField($model,'cod_edad'); ?>
		<?php echo $form->error($model,'cod_edad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_clientes'); ?>
		<?php echo $form->textField($model,'num_clientes'); ?>
		<?php echo $form->error($model,'num_clientes'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->