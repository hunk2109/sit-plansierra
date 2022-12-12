<?php
/* @var $this TblMercadoController */
/* @var $model TblMercado */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_mercado'); ?>
		<?php echo $form->textField($model,'id_mercado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'desc_mercado'); ?>
		<?php echo $form->textArea($model,'desc_mercado',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_sector'); ?>
		<?php echo $form->textField($model,'id_sector'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->