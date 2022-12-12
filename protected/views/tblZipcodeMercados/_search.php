<?php
/* @var $this TblZipcodeMercadosController */
/* @var $model TblZipcodeMercados */
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
		<?php echo $form->label($model,'id_consulta_en_cp'); ?>
		<?php echo $form->textField($model,'id_consulta_en_cp'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_mercado'); ?>
		<?php echo $form->textField($model,'id_mercado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cv'); ?>
		<?php echo $form->textField($model,'cv'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'caddy'); ?>
		<?php echo $form->textField($model,'caddy'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->