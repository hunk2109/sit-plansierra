<?php
/* @var $this TblPoblaAisController */
/* @var $model TblPoblaAis */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'seccion'); ?>
		<?php echo $form->textArea($model,'seccion',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'habitantes'); ?>
		<?php echo $form->textField($model,'habitantes'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'familias'); ?>
		<?php echo $form->textField($model,'familias'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'a'); ?>
		<?php echo $form->textField($model,'a'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'b'); ?>
		<?php echo $form->textField($model,'b'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c'); ?>
		<?php echo $form->textField($model,'c'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'d'); ?>
		<?php echo $form->textField($model,'d'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'e'); ?>
		<?php echo $form->textField($model,'e'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'f'); ?>
		<?php echo $form->textField($model,'f'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'g'); ?>
		<?php echo $form->textField($model,'g'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'h'); ?>
		<?php echo $form->textField($model,'h'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'i'); ?>
		<?php echo $form->textField($model,'i'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'j'); ?>
		<?php echo $form->textField($model,'j'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'k'); ?>
		<?php echo $form->textField($model,'k'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'l'); ?>
		<?php echo $form->textField($model,'l'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'m'); ?>
		<?php echo $form->textField($model,'m'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'n'); ?>
		<?php echo $form->textField($model,'n'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'o'); ?>
		<?php echo $form->textField($model,'o'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p'); ?>
		<?php echo $form->textField($model,'p'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q'); ?>
		<?php echo $form->textField($model,'q'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'r'); ?>
		<?php echo $form->textField($model,'r'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'a_por'); ?>
		<?php echo $form->textField($model,'a_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'b_por'); ?>
		<?php echo $form->textField($model,'b_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'c_por'); ?>
		<?php echo $form->textField($model,'c_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'d_por'); ?>
		<?php echo $form->textField($model,'d_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'e_por'); ?>
		<?php echo $form->textField($model,'e_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'f_por'); ?>
		<?php echo $form->textField($model,'f_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'g_por'); ?>
		<?php echo $form->textField($model,'g_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'h_por'); ?>
		<?php echo $form->textField($model,'h_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'i_por'); ?>
		<?php echo $form->textField($model,'i_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'j_por'); ?>
		<?php echo $form->textField($model,'j_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'k_por'); ?>
		<?php echo $form->textField($model,'k_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'l_por'); ?>
		<?php echo $form->textField($model,'l_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'m_por'); ?>
		<?php echo $form->textField($model,'m_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'n_por'); ?>
		<?php echo $form->textField($model,'n_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'o_por'); ?>
		<?php echo $form->textField($model,'o_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_por'); ?>
		<?php echo $form->textField($model,'p_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'q_por'); ?>
		<?php echo $form->textField($model,'q_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'r_por'); ?>
		<?php echo $form->textField($model,'r_por'); ?>
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