<?php
/* @var $this TblEcomController */
/* @var $model TblEcom */
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
		<?php echo $form->label($model,'fecha'); ?>
		<?php echo $form->textField($model,'fecha'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_hiper'); ?>
		<?php echo $form->textField($model,'id_hiper'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cp'); ?>
		<?php echo $form->textField($model,'cp',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cv'); ?>
		<?php echo $form->textField($model,'cv'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo_entrega'); ?>
		<?php echo $form->textField($model,'tipo_entrega'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_pedidos'); ?>
		<?php echo $form->textField($model,'num_pedidos'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'clientes_unicos'); ?>
		<?php echo $form->textField($model,'clientes_unicos'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->