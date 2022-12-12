<?php
/* @var $this GeoSeccionesController */
/* @var $model GeoSecciones */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'geom'); ?>
		<?php echo $form->textField($model,'geom',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cod_secc'); ?>
		<?php echo $form->textField($model,'cod_secc',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cod_mun'); ?>
		<?php echo $form->textField($model,'cod_mun',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pob_0005'); ?>
		<?php echo $form->textField($model,'pob_0005'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pob_0514'); ?>
		<?php echo $form->textField($model,'pob_0514'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pob_1519'); ?>
		<?php echo $form->textField($model,'pob_1519'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pob_2029'); ?>
		<?php echo $form->textField($model,'pob_2029'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pob_2965'); ?>
		<?php echo $form->textField($model,'pob_2965'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pob_6599'); ?>
		<?php echo $form->textField($model,'pob_6599'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pobex_afric'); ?>
		<?php echo $form->textField($model,'pobex_afric'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pobex_ameri'); ?>
		<?php echo $form->textField($model,'pobex_ameri'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pobex_asiat'); ?>
		<?php echo $form->textField($model,'pobex_asiat'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pobex_europ'); ?>
		<?php echo $form->textField($model,'pobex_europ'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pobex_resto'); ?>
		<?php echo $form->textField($model,'pobex_resto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->