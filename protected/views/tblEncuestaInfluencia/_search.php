<?php
/* @var $this TblEncuestaInfluenciaController */
/* @var $model TblEncuestaInfluencia */
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
		<?php echo $form->label($model,'id_encuesta'); ?>
		<?php echo $form->textField($model,'id_encuesta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'registro_encuesta'); ?>
		<?php echo $form->textField($model,'registro_encuesta'); ?>
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
		<?php echo $form->label($model,'cp'); ?>
		<?php echo $form->textArea($model,'cp',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'loc_mkt'); ?>
		<?php echo $form->textArea($model,'loc_mkt',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ponderacion'); ?>
		<?php echo $form->textField($model,'ponderacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->