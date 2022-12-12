<?php
/* @var $this TblMunicipiosController */
/* @var $model TblMunicipios */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-municipios-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cod_mun'); ?>
		<?php echo $form->textArea($model,'cod_mun',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'cod_mun'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'desc_mun'); ?>
		<?php echo $form->textArea($model,'desc_mun',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'desc_mun'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->