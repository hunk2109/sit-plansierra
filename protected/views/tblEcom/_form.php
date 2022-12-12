<?php
/* @var $this TblEcomController */
/* @var $model TblEcom */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-ecom-form',
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
		<?php echo $form->labelEx($model,'id_hiper'); ?>
		<?php echo $form->textField($model,'id_hiper'); ?>
		<?php echo $form->error($model,'id_hiper'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cp'); ?>
		<?php echo $form->textField($model,'cp',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'cp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cv'); ?>
		<?php echo $form->textField($model,'cv'); ?>
		<?php echo $form->error($model,'cv'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_entrega'); ?>
		<?php echo $form->textField($model,'tipo_entrega'); ?>
		<?php echo $form->error($model,'tipo_entrega'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_pedidos'); ?>
		<?php echo $form->textField($model,'num_pedidos'); ?>
		<?php echo $form->error($model,'num_pedidos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'clientes_unicos'); ?>
		<?php echo $form->textField($model,'clientes_unicos'); ?>
		<?php echo $form->error($model,'clientes_unicos'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->