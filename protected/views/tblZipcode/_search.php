<?php
/* @var $this TblZipcodeController */
/* @var $model TblZipcode */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_consulta_por_cp'); ?>
		<?php echo $form->textField($model,'id_consulta_por_cp'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_encuesta_zc'); ?>
		<?php echo $form->textField($model,'id_encuesta_zc'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cp'); ?>
		<?php echo $form->textArea($model,'cp',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cv'); ?>
		<?php echo $form->textField($model,'cv'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'caddy'); ?>
		<?php echo $form->textField($model,'caddy'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pasos'); ?>
		<?php echo $form->textField($model,'pasos'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'folleto'); ?>
		<?php echo $form->textField($model,'folleto'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->