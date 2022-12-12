<?php
/* @var $this SeccionesController */
/* @var $model Secciones */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'secciones-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cusec'); ?>
		<?php echo $form->textField($model,'cusec',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'cusec'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cumun'); ?>
		<?php echo $form->textField($model,'cumun',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'cumun'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'csec'); ?>
		<?php echo $form->textField($model,'csec',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'csec'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cdis'); ?>
		<?php echo $form->textField($model,'cdis',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'cdis'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cmun'); ?>
		<?php echo $form->textField($model,'cmun',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'cmun'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cpro'); ?>
		<?php echo $form->textField($model,'cpro',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'cpro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cca'); ?>
		<?php echo $form->textField($model,'cca',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'cca'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cudis'); ?>
		<?php echo $form->textField($model,'cudis',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($model,'cudis'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'clau2'); ?>
		<?php echo $form->textField($model,'clau2',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'clau2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'npro'); ?>
		<?php echo $form->textField($model,'npro',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'npro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nca'); ?>
		<?php echo $form->textField($model,'nca',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nca'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nmun'); ?>
		<?php echo $form->textField($model,'nmun',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nmun'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cnut0'); ?>
		<?php echo $form->textField($model,'cnut0',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'cnut0'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cnut1'); ?>
		<?php echo $form->textField($model,'cnut1',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'cnut1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cnut2'); ?>
		<?php echo $form->textField($model,'cnut2',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'cnut2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cnut3'); ?>
		<?php echo $form->textField($model,'cnut3',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'cnut3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'shape_leng'); ?>
		<?php echo $form->textField($model,'shape_leng'); ?>
		<?php echo $form->error($model,'shape_leng'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'shape_area'); ?>
		<?php echo $form->textField($model,'shape_area'); ?>
		<?php echo $form->error($model,'shape_area'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'provmun'); ?>
		<?php echo $form->textField($model,'provmun',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'provmun'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'distrito'); ?>
		<?php echo $form->textField($model,'distrito',array('size'=>2,'maxlength'=>2)); ?>
		<?php echo $form->error($model,'distrito'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'seccion'); ?>
		<?php echo $form->textField($model,'seccion',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'seccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'seccion_1'); ?>
		<?php echo $form->textField($model,'seccion_1',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'seccion_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cod_secc_2'); ?>
		<?php echo $form->textField($model,'cod_secc_2',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'cod_secc_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cod_secc'); ?>
		<?php echo $form->textField($model,'cod_secc',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'cod_secc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'oid_'); ?>
		<?php echo $form->textField($model,'oid_'); ?>
		<?php echo $form->error($model,'oid_'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'objectid'); ?>
		<?php echo $form->textField($model,'objectid'); ?>
		<?php echo $form->error($model,'objectid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cod_secc_1'); ?>
		<?php echo $form->textField($model,'cod_secc_1',array('size'=>60,'maxlength'=>254)); ?>
		<?php echo $form->error($model,'cod_secc_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x4_h'); ?>
		<?php echo $form->textField($model,'x4_h'); ?>
		<?php echo $form->error($model,'x4_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x9_h'); ?>
		<?php echo $form->textField($model,'x9_h'); ?>
		<?php echo $form->error($model,'x9_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x14_h'); ?>
		<?php echo $form->textField($model,'x14_h'); ?>
		<?php echo $form->error($model,'x14_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x19_h'); ?>
		<?php echo $form->textField($model,'x19_h'); ?>
		<?php echo $form->error($model,'x19_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x24_h'); ?>
		<?php echo $form->textField($model,'x24_h'); ?>
		<?php echo $form->error($model,'x24_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x29_h'); ?>
		<?php echo $form->textField($model,'x29_h'); ?>
		<?php echo $form->error($model,'x29_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x34_h'); ?>
		<?php echo $form->textField($model,'x34_h'); ?>
		<?php echo $form->error($model,'x34_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x39_h'); ?>
		<?php echo $form->textField($model,'x39_h'); ?>
		<?php echo $form->error($model,'x39_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x44_h'); ?>
		<?php echo $form->textField($model,'x44_h'); ?>
		<?php echo $form->error($model,'x44_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x49_h'); ?>
		<?php echo $form->textField($model,'x49_h'); ?>
		<?php echo $form->error($model,'x49_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x54_h'); ?>
		<?php echo $form->textField($model,'x54_h'); ?>
		<?php echo $form->error($model,'x54_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x59_h'); ?>
		<?php echo $form->textField($model,'x59_h'); ?>
		<?php echo $form->error($model,'x59_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x64_h'); ?>
		<?php echo $form->textField($model,'x64_h'); ?>
		<?php echo $form->error($model,'x64_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x69_h'); ?>
		<?php echo $form->textField($model,'x69_h'); ?>
		<?php echo $form->error($model,'x69_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x74_h'); ?>
		<?php echo $form->textField($model,'x74_h'); ?>
		<?php echo $form->error($model,'x74_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x79_h'); ?>
		<?php echo $form->textField($model,'x79_h'); ?>
		<?php echo $form->error($model,'x79_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x84_h'); ?>
		<?php echo $form->textField($model,'x84_h'); ?>
		<?php echo $form->error($model,'x84_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x89_h'); ?>
		<?php echo $form->textField($model,'x89_h'); ?>
		<?php echo $form->error($model,'x89_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x94_h'); ?>
		<?php echo $form->textField($model,'x94_h'); ?>
		<?php echo $form->error($model,'x94_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x99_h'); ?>
		<?php echo $form->textField($model,'x99_h'); ?>
		<?php echo $form->error($model,'x99_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x100_h'); ?>
		<?php echo $form->textField($model,'x100_h'); ?>
		<?php echo $form->error($model,'x100_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_h'); ?>
		<?php echo $form->textField($model,'total_h'); ?>
		<?php echo $form->error($model,'total_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'oid1'); ?>
		<?php echo $form->textField($model,'oid1'); ?>
		<?php echo $form->error($model,'oid1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'objectid_1'); ?>
		<?php echo $form->textField($model,'objectid_1'); ?>
		<?php echo $form->error($model,'objectid_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cod_secc_3'); ?>
		<?php echo $form->textField($model,'cod_secc_3',array('size'=>60,'maxlength'=>254)); ?>
		<?php echo $form->error($model,'cod_secc_3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x4_m'); ?>
		<?php echo $form->textField($model,'x4_m'); ?>
		<?php echo $form->error($model,'x4_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x9_m'); ?>
		<?php echo $form->textField($model,'x9_m'); ?>
		<?php echo $form->error($model,'x9_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x14_m'); ?>
		<?php echo $form->textField($model,'x14_m'); ?>
		<?php echo $form->error($model,'x14_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x19_m'); ?>
		<?php echo $form->textField($model,'x19_m'); ?>
		<?php echo $form->error($model,'x19_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x24_m'); ?>
		<?php echo $form->textField($model,'x24_m'); ?>
		<?php echo $form->error($model,'x24_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x29_m'); ?>
		<?php echo $form->textField($model,'x29_m'); ?>
		<?php echo $form->error($model,'x29_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x34_m'); ?>
		<?php echo $form->textField($model,'x34_m'); ?>
		<?php echo $form->error($model,'x34_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x39_m'); ?>
		<?php echo $form->textField($model,'x39_m'); ?>
		<?php echo $form->error($model,'x39_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x44_m'); ?>
		<?php echo $form->textField($model,'x44_m'); ?>
		<?php echo $form->error($model,'x44_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x49_m'); ?>
		<?php echo $form->textField($model,'x49_m'); ?>
		<?php echo $form->error($model,'x49_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x54_m'); ?>
		<?php echo $form->textField($model,'x54_m'); ?>
		<?php echo $form->error($model,'x54_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x59_m'); ?>
		<?php echo $form->textField($model,'x59_m'); ?>
		<?php echo $form->error($model,'x59_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x64_m'); ?>
		<?php echo $form->textField($model,'x64_m'); ?>
		<?php echo $form->error($model,'x64_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x69_m'); ?>
		<?php echo $form->textField($model,'x69_m'); ?>
		<?php echo $form->error($model,'x69_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x74_m'); ?>
		<?php echo $form->textField($model,'x74_m'); ?>
		<?php echo $form->error($model,'x74_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x79_m'); ?>
		<?php echo $form->textField($model,'x79_m'); ?>
		<?php echo $form->error($model,'x79_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x84_m'); ?>
		<?php echo $form->textField($model,'x84_m'); ?>
		<?php echo $form->error($model,'x84_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x89_m'); ?>
		<?php echo $form->textField($model,'x89_m'); ?>
		<?php echo $form->error($model,'x89_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x94_m'); ?>
		<?php echo $form->textField($model,'x94_m'); ?>
		<?php echo $form->error($model,'x94_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x99_m'); ?>
		<?php echo $form->textField($model,'x99_m'); ?>
		<?php echo $form->error($model,'x99_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'x100_m'); ?>
		<?php echo $form->textField($model,'x100_m'); ?>
		<?php echo $form->error($model,'x100_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_m'); ?>
		<?php echo $form->textField($model,'total_m'); ?>
		<?php echo $form->error($model,'total_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total'); ?>
		<?php echo $form->textField($model,'total'); ?>
		<?php echo $form->error($model,'total'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'oid1_1'); ?>
		<?php echo $form->textField($model,'oid1_1'); ?>
		<?php echo $form->error($model,'oid1_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'objectid_2'); ?>
		<?php echo $form->textField($model,'objectid_2'); ?>
		<?php echo $form->error($model,'objectid_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cod_secc_4'); ?>
		<?php echo $form->textField($model,'cod_secc_4',array('size'=>60,'maxlength'=>254)); ?>
		<?php echo $form->error($model,'cod_secc_4'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total_ex_1'); ?>
		<?php echo $form->textField($model,'total_ex_1'); ?>
		<?php echo $form->error($model,'total_ex_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'africana_1'); ?>
		<?php echo $form->textField($model,'africana_1'); ?>
		<?php echo $form->error($model,'africana_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'american_1'); ?>
		<?php echo $form->textField($model,'american_1'); ?>
		<?php echo $form->error($model,'american_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'asiatica_1'); ?>
		<?php echo $form->textField($model,'asiatica_1'); ?>
		<?php echo $form->error($model,'asiatica_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'europea_1'); ?>
		<?php echo $form->textField($model,'europea_1'); ?>
		<?php echo $form->error($model,'europea_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'resto_1'); ?>
		<?php echo $form->textField($model,'resto_1'); ?>
		<?php echo $form->error($model,'resto_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_extran'); ?>
		<?php echo $form->textField($model,'p_extran'); ?>
		<?php echo $form->error($model,'p_extran'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_africa'); ?>
		<?php echo $form->textField($model,'p_africa'); ?>
		<?php echo $form->error($model,'p_africa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_americ'); ?>
		<?php echo $form->textField($model,'p_americ'); ?>
		<?php echo $form->error($model,'p_americ'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_asiati'); ?>
		<?php echo $form->textField($model,'p_asiati'); ?>
		<?php echo $form->error($model,'p_asiati'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_europe'); ?>
		<?php echo $form->textField($model,'p_europe'); ?>
		<?php echo $form->error($model,'p_europe'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'p_resto'); ?>
		<?php echo $form->textField($model,'p_resto'); ?>
		<?php echo $form->error($model,'p_resto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'geom'); ?>
		<?php echo $form->textField($model,'geom',array('size'=>0,'maxlength'=>0)); ?>
		<?php echo $form->error($model,'geom'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'infancia'); ?>
		<?php echo $form->textField($model,'infancia'); ?>
		<?php echo $form->error($model,'infancia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'juventud'); ?>
		<?php echo $form->textField($model,'juventud'); ?>
		<?php echo $form->error($model,'juventud'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vejez'); ?>
		<?php echo $form->textField($model,'vejez'); ?>
		<?php echo $form->error($model,'vejez'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'adultos_25_34'); ?>
		<?php echo $form->textField($model,'adultos_25_34'); ?>
		<?php echo $form->error($model,'adultos_25_34'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'adultos_35_44'); ?>
		<?php echo $form->textField($model,'adultos_35_44'); ?>
		<?php echo $form->error($model,'adultos_35_44'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'adultos_45_54'); ?>
		<?php echo $form->textField($model,'adultos_45_54'); ?>
		<?php echo $form->error($model,'adultos_45_54'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'adultos_55_64'); ?>
		<?php echo $form->textField($model,'adultos_55_64'); ?>
		<?php echo $form->error($model,'adultos_55_64'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'adultos_65_74'); ?>
		<?php echo $form->textField($model,'adultos_65_74'); ?>
		<?php echo $form->error($model,'adultos_65_74'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tam_familia'); ?>
		<?php echo $form->textField($model,'tam_familia'); ?>
		<?php echo $form->error($model,'tam_familia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nivel_estudios'); ?>
		<?php echo $form->textField($model,'nivel_estudios'); ?>
		<?php echo $form->error($model,'nivel_estudios'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'porc_casados'); ?>
		<?php echo $form->textField($model,'porc_casados'); ?>
		<?php echo $form->error($model,'porc_casados'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'size_viv'); ?>
		<?php echo $form->textField($model,'size_viv'); ?>
		<?php echo $form->error($model,'size_viv'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'rooms_viv'); ?>
		<?php echo $form->textField($model,'rooms_viv'); ?>
		<?php echo $form->error($model,'rooms_viv'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'price_viv'); ?>
		<?php echo $form->textField($model,'price_viv'); ?>
		<?php echo $form->error($model,'price_viv'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->