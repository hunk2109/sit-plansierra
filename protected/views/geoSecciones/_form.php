<?php
/* @var $this GeoSeccionesController */
/* @var $model GeoSecciones */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'geo-secciones-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'geom'); ?>
		<?php echo $form->textField($model,'geom',array('size'=>0,'maxlength'=>0)); ?>
		<?php echo $form->error($model,'geom'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cod_secc'); ?>
		<?php echo $form->textField($model,'cod_secc',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'cod_secc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cod_mun'); ?>
		<?php echo $form->textField($model,'cod_mun',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'cod_mun'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pob_0005'); ?>
		<?php echo $form->textField($model,'pob_0005'); ?>
		<?php echo $form->error($model,'pob_0005'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pob_0514'); ?>
		<?php echo $form->textField($model,'pob_0514'); ?>
		<?php echo $form->error($model,'pob_0514'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pob_1519'); ?>
		<?php echo $form->textField($model,'pob_1519'); ?>
		<?php echo $form->error($model,'pob_1519'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pob_2029'); ?>
		<?php echo $form->textField($model,'pob_2029'); ?>
		<?php echo $form->error($model,'pob_2029'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pob_2965'); ?>
		<?php echo $form->textField($model,'pob_2965'); ?>
		<?php echo $form->error($model,'pob_2965'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pob_6599'); ?>
		<?php echo $form->textField($model,'pob_6599'); ?>
		<?php echo $form->error($model,'pob_6599'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pobex_afric'); ?>
		<?php echo $form->textField($model,'pobex_afric'); ?>
		<?php echo $form->error($model,'pobex_afric'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pobex_ameri'); ?>
		<?php echo $form->textField($model,'pobex_ameri'); ?>
		<?php echo $form->error($model,'pobex_ameri'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pobex_asiat'); ?>
		<?php echo $form->textField($model,'pobex_asiat'); ?>
		<?php echo $form->error($model,'pobex_asiat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pobex_europ'); ?>
		<?php echo $form->textField($model,'pobex_europ'); ?>
		<?php echo $form->error($model,'pobex_europ'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pobex_resto'); ?>
		<?php echo $form->textField($model,'pobex_resto'); ?>
		<?php echo $form->error($model,'pobex_resto'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->