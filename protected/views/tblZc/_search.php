<?php
/* @var $this TblZcController */
/* @var $model TblZc */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'cod_zipcode'); ?>
		<?php echo $form->textField($model,'cod_zipcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_ini'); ?>
		<?php echo $form->textField($model,'fecha_ini'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_fin'); ?>
		<?php echo $form->textField($model,'fecha_fin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_alcampo'); ?>
		<?php echo $form->textField($model,'id_alcampo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo_zc'); ?>
		<?php echo $form->textField($model,'tipo_zc'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cv'); ?>
		<?php echo $form->textField($model,'cv'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->