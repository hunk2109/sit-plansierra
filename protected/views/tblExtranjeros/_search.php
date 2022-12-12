<?php
/* @var $this TblExtranjerosController */
/* @var $model TblExtranjeros */
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
		<?php echo $form->label($model,'seccion'); ?>
		<?php echo $form->textArea($model,'seccion',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nacionalidad'); ?>
		<?php echo $form->textField($model,'nacionalidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'poblacion'); ?>
		<?php echo $form->textField($model,'poblacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->