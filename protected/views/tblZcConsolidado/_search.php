<?php
/* @var $this TblZcConsolidadoController */
/* @var $model TblZcConsolidado */
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
		<?php echo $form->label($model,'cod_zipcode'); ?>
		<?php echo $form->textField($model,'cod_zipcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cp'); ?>
		<?php echo $form->textArea($model,'cp',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'venta_si'); ?>
		<?php echo $form->textField($model,'venta_si'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'venta_no'); ?>
		<?php echo $form->textField($model,'venta_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'venta_ns'); ?>
		<?php echo $form->textField($model,'venta_ns'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'folleto_si'); ?>
		<?php echo $form->textField($model,'folleto_si'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'folleto_no'); ?>
		<?php echo $form->textField($model,'folleto_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'folleto_ns'); ?>
		<?php echo $form->textField($model,'folleto_ns'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->