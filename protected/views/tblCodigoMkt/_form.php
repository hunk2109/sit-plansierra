<?php
/* @var $this TblCodigoMktController */
/* @var $model TblCodigoMkt */
/* @var $form CActiveForm */
?>
<div class="row">
	<div class="well col-lg-6 col-lg-offset-3">
		<a href='index.php?r=tblCodigoMkt/actualizaCodigoMkt' class="btn btn-primary pull-right">Ir a Actualizar Códigos Mkt</a>
		<br/>
		<div class="form">
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>'tbl-codigo-mkt-form',
				'enableAjaxValidation'=>false,
			)); ?>

			<p class="note">Los campos con <span class="required">*</span> son obligatorios.</p>

			<?php echo $form->errorSummary($model); ?>
			
			<div class="form-group">
				<?php echo $form->labelEx($model,'codigo'); ?>
				<br/>
				<?php echo $form->textField($model,'codigo',array('class'=>'form-control')); ?>
				<?php echo $form->error($model,'codigo'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'tipo'); ?>
				<br/>
				<?php echo $form->textField($model,'tipo',array('class'=>'form-control')); ?>
				<?php echo $form->error($model,'tipo'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'nielssen'); ?>
				<br/>
				<?php echo $form->textArea($model,'nielssen',array('rows'=>6, 'cols'=>50,'class'=>'form-control', 'style'=>'resize: none;')); ?>
				<?php echo $form->error($model,'nielssen'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'etiqueta'); ?>
				<br/>
				<?php echo $form->textField($model,'etiqueta',array('class'=>'form-control')); ?>
				<?php echo $form->error($model,'etiqueta'); ?>
			</div>

			<div class="form-group">
				<?php echo $form->labelEx($model,'observ'); ?>
				<br/>
				<?php echo $form->textArea($model,'observ',array('rows'=>6, 'cols'=>50,'class'=>'form-control', 'style'=>'resize: none;')); ?>
				<?php echo $form->error($model,'observ'); ?>
			</div>

			<div class="form-group" align="center">
				<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar',array('class'=>'btn btn-primary')); ?>
			</div>
			<?php $this->endWidget(); ?>
		</div><!-- form -->
	</div>
</div>