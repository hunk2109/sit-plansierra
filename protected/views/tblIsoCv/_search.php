<?php
/* @var $this TblIsoCvController */
/* @var $model TblIsoCv */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_iso_cv_zc'); ?>
		<?php echo $form->textField($model,'id_iso_cv_zc'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_encuesta_zc'); ?>
		<?php echo $form->textField($model,'id_encuesta_zc'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'iso'); ?>
		<?php echo $form->textField($model,'iso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cv'); ?>
		<?php echo $form->textField($model,'cv'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->