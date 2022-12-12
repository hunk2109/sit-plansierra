<?php
/* @var $this GeoZonaInfluenciaController */
/* @var $model GeoZonaInfluencia */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'gid'); ?>
		<?php echo $form->textField($model,'gid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'loc'); ?>
		<?php echo $form->textField($model,'loc',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'geom'); ?>
		<?php echo $form->textField($model,'geom',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->