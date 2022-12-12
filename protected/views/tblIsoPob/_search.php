<?php
/* @var $this TblIsoPobController */
/* @var $model TblIsoPob */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_encuesta_zc'); ?>
		<?php echo $form->textField($model,'id_encuesta_zc'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'secc'); ?>
		<?php echo $form->textArea($model,'secc',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p1'); ?>
		<?php echo $form->textField($model,'p1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p2'); ?>
		<?php echo $form->textField($model,'p2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p3'); ?>
		<?php echo $form->textField($model,'p3'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p4'); ?>
		<?php echo $form->textField($model,'p4'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p5'); ?>
		<?php echo $form->textField($model,'p5'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_secc'); ?>
		<?php echo $form->textField($model,'p_secc'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->