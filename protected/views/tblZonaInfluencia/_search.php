<?php
/* @var $this TblZonaInfluenciaController */
/* @var $model TblZonaInfluencia */
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
		<?php echo $form->label($model,'id_hiper_alcampo'); ?>
		<?php echo $form->textField($model,'id_hiper_alcampo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_tipo_zi'); ?>
		<?php echo $form->textField($model,'id_tipo_zi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'loc'); ?>
		<?php echo $form->textArea($model,'loc',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->