<?php
/* @var $this TblEtiquetaController */
/* @var $model TblEtiqueta */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_etiqueta'); ?>
		<?php echo $form->textField($model,'id_etiqueta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'etiqueta'); ?>
		<?php echo $form->textArea($model,'etiqueta',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'logo'); ?>
		<?php echo $form->textArea($model,'logo',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->