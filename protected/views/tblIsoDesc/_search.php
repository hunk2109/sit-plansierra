<?php
/* @var $this TblIsoDescController */
/* @var $model TblIsoDesc */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_iso'); ?>
		<?php echo $form->textField($model,'id_iso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'iso_nom'); ?>
		<?php echo $form->textArea($model,'iso_nom',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->