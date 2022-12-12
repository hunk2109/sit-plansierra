<?php
/* @var $this TblIdEncuestaController */
/* @var $model TblIdEncuesta */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'fecha_encuesta'); ?>
		<?php echo $form->textField($model,'fecha_encuesta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_alcampo'); ?>
		<?php echo $form->textField($model,'id_alcampo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_encuesta'); ?>
		<?php echo $form->textField($model,'id_encuesta'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->