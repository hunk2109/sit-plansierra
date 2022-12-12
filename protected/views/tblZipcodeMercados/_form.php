<?php
/* @var $this TblZipcodeMercadosController */
/* @var $model TblZipcodeMercados */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-zipcode-mercados-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_consulta_en_cp'); ?>
		<?php echo $form->textField($model,'id_consulta_en_cp'); ?>
		<?php echo $form->error($model,'id_consulta_en_cp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_mercado'); ?>
		<?php echo $form->textField($model,'id_mercado'); ?>
		<?php echo $form->error($model,'id_mercado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cv'); ?>
		<?php echo $form->textField($model,'cv'); ?>
		<?php echo $form->error($model,'cv'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'caddy'); ?>
		<?php echo $form->textField($model,'caddy'); ?>
		<?php echo $form->error($model,'caddy'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->