<?php
/* @var $this TblClFuentesController */
/* @var $model TblClFuentes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'cod_fuente'); ?>
		<?php echo $form->textField($model,'cod_fuente'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'desc_fuente'); ?>
		<?php echo $form->textArea($model,'desc_fuente',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->