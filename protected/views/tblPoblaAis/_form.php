<?php
/* @var $this TblPoblaAisController */
/* @var $model TblPoblaAis */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tbl-pobla-ais-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'seccion'); ?>
		<?php echo $form->textArea($model,'seccion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'seccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'habitantes'); ?>
		<?php echo $form->textField($model,'habitantes'); ?>
		<?php echo $form->error($model,'habitantes'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'familias'); ?>
		<?php echo $form->textField($model,'familias'); ?>
		<?php echo $form->error($model,'familias'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'a'); ?>
		<?php echo $form->textField($model,'a'); ?>
		<?php echo $form->error($model,'a'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'b'); ?>
		<?php echo $form->textField($model,'b'); ?>
		<?php echo $form->error($model,'b'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c'); ?>
		<?php echo $form->textField($model,'c'); ?>
		<?php echo $form->error($model,'c'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'d'); ?>
		<?php echo $form->textField($model,'d'); ?>
		<?php echo $form->error($model,'d'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'e'); ?>
		<?php echo $form->textField($model,'e'); ?>
		<?php echo $form->error($model,'e'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'f'); ?>
		<?php echo $form->textField($model,'f'); ?>
		<?php echo $form->error($model,'f'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'g'); ?>
		<?php echo $form->textField($model,'g'); ?>
		<?php echo $form->error($model,'g'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'h'); ?>
		<?php echo $form->textField($model,'h'); ?>
		<?php echo $form->error($model,'h'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'i'); ?>
		<?php echo $form->textField($model,'i'); ?>
		<?php echo $form->error($model,'i'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'j'); ?>
		<?php echo $form->textField($model,'j'); ?>
		<?php echo $form->error($model,'j'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'k'); ?>
		<?php echo $form->textField($model,'k'); ?>
		<?php echo $form->error($model,'k'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'l'); ?>
		<?php echo $form->textField($model,'l'); ?>
		<?php echo $form->error($model,'l'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'m'); ?>
		<?php echo $form->textField($model,'m'); ?>
		<?php echo $form->error($model,'m'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'n'); ?>
		<?php echo $form->textField($model,'n'); ?>
		<?php echo $form->error($model,'n'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'o'); ?>
		<?php echo $form->textField($model,'o'); ?>
		<?php echo $form->error($model,'o'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p'); ?>
		<?php echo $form->textField($model,'p'); ?>
		<?php echo $form->error($model,'p'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'q'); ?>
		<?php echo $form->textField($model,'q'); ?>
		<?php echo $form->error($model,'q'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'r'); ?>
		<?php echo $form->textField($model,'r'); ?>
		<?php echo $form->error($model,'r'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'a_por'); ?>
		<?php echo $form->textField($model,'a_por'); ?>
		<?php echo $form->error($model,'a_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'b_por'); ?>
		<?php echo $form->textField($model,'b_por'); ?>
		<?php echo $form->error($model,'b_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'c_por'); ?>
		<?php echo $form->textField($model,'c_por'); ?>
		<?php echo $form->error($model,'c_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'d_por'); ?>
		<?php echo $form->textField($model,'d_por'); ?>
		<?php echo $form->error($model,'d_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'e_por'); ?>
		<?php echo $form->textField($model,'e_por'); ?>
		<?php echo $form->error($model,'e_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'f_por'); ?>
		<?php echo $form->textField($model,'f_por'); ?>
		<?php echo $form->error($model,'f_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'g_por'); ?>
		<?php echo $form->textField($model,'g_por'); ?>
		<?php echo $form->error($model,'g_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'h_por'); ?>
		<?php echo $form->textField($model,'h_por'); ?>
		<?php echo $form->error($model,'h_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'i_por'); ?>
		<?php echo $form->textField($model,'i_por'); ?>
		<?php echo $form->error($model,'i_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'j_por'); ?>
		<?php echo $form->textField($model,'j_por'); ?>
		<?php echo $form->error($model,'j_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'k_por'); ?>
		<?php echo $form->textField($model,'k_por'); ?>
		<?php echo $form->error($model,'k_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'l_por'); ?>
		<?php echo $form->textField($model,'l_por'); ?>
		<?php echo $form->error($model,'l_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'m_por'); ?>
		<?php echo $form->textField($model,'m_por'); ?>
		<?php echo $form->error($model,'m_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'n_por'); ?>
		<?php echo $form->textField($model,'n_por'); ?>
		<?php echo $form->error($model,'n_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'o_por'); ?>
		<?php echo $form->textField($model,'o_por'); ?>
		<?php echo $form->error($model,'o_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_por'); ?>
		<?php echo $form->textField($model,'p_por'); ?>
		<?php echo $form->error($model,'p_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'q_por'); ?>
		<?php echo $form->textField($model,'q_por'); ?>
		<?php echo $form->error($model,'q_por'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'r_por'); ?>
		<?php echo $form->textField($model,'r_por'); ?>
		<?php echo $form->error($model,'r_por'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->