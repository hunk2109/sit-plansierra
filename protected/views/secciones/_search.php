<?php
/* @var $this SeccionesController */
/* @var $model Secciones */
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
		<?php echo $form->label($model,'cusec'); ?>
		<?php echo $form->textField($model,'cusec',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cumun'); ?>
		<?php echo $form->textField($model,'cumun',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'csec'); ?>
		<?php echo $form->textField($model,'csec',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cdis'); ?>
		<?php echo $form->textField($model,'cdis',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cmun'); ?>
		<?php echo $form->textField($model,'cmun',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cpro'); ?>
		<?php echo $form->textField($model,'cpro',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cca'); ?>
		<?php echo $form->textField($model,'cca',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cudis'); ?>
		<?php echo $form->textField($model,'cudis',array('size'=>7,'maxlength'=>7)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'clau2'); ?>
		<?php echo $form->textField($model,'clau2',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'npro'); ?>
		<?php echo $form->textField($model,'npro',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nca'); ?>
		<?php echo $form->textField($model,'nca',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nmun'); ?>
		<?php echo $form->textField($model,'nmun',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cnut0'); ?>
		<?php echo $form->textField($model,'cnut0',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cnut1'); ?>
		<?php echo $form->textField($model,'cnut1',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cnut2'); ?>
		<?php echo $form->textField($model,'cnut2',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cnut3'); ?>
		<?php echo $form->textField($model,'cnut3',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'shape_leng'); ?>
		<?php echo $form->textField($model,'shape_leng'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'shape_area'); ?>
		<?php echo $form->textField($model,'shape_area'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'provmun'); ?>
		<?php echo $form->textField($model,'provmun',array('size'=>5,'maxlength'=>5)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'distrito'); ?>
		<?php echo $form->textField($model,'distrito',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'seccion'); ?>
		<?php echo $form->textField($model,'seccion',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'seccion_1'); ?>
		<?php echo $form->textField($model,'seccion_1',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cod_secc_2'); ?>
		<?php echo $form->textField($model,'cod_secc_2',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cod_secc'); ?>
		<?php echo $form->textField($model,'cod_secc',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'oid_'); ?>
		<?php echo $form->textField($model,'oid_'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'objectid'); ?>
		<?php echo $form->textField($model,'objectid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cod_secc_1'); ?>
		<?php echo $form->textField($model,'cod_secc_1',array('size'=>60,'maxlength'=>254)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x4_h'); ?>
		<?php echo $form->textField($model,'x4_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x9_h'); ?>
		<?php echo $form->textField($model,'x9_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x14_h'); ?>
		<?php echo $form->textField($model,'x14_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x19_h'); ?>
		<?php echo $form->textField($model,'x19_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x24_h'); ?>
		<?php echo $form->textField($model,'x24_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x29_h'); ?>
		<?php echo $form->textField($model,'x29_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x34_h'); ?>
		<?php echo $form->textField($model,'x34_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x39_h'); ?>
		<?php echo $form->textField($model,'x39_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x44_h'); ?>
		<?php echo $form->textField($model,'x44_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x49_h'); ?>
		<?php echo $form->textField($model,'x49_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x54_h'); ?>
		<?php echo $form->textField($model,'x54_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x59_h'); ?>
		<?php echo $form->textField($model,'x59_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x64_h'); ?>
		<?php echo $form->textField($model,'x64_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x69_h'); ?>
		<?php echo $form->textField($model,'x69_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x74_h'); ?>
		<?php echo $form->textField($model,'x74_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x79_h'); ?>
		<?php echo $form->textField($model,'x79_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x84_h'); ?>
		<?php echo $form->textField($model,'x84_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x89_h'); ?>
		<?php echo $form->textField($model,'x89_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x94_h'); ?>
		<?php echo $form->textField($model,'x94_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x99_h'); ?>
		<?php echo $form->textField($model,'x99_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x100_h'); ?>
		<?php echo $form->textField($model,'x100_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_h'); ?>
		<?php echo $form->textField($model,'total_h'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'oid1'); ?>
		<?php echo $form->textField($model,'oid1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'objectid_1'); ?>
		<?php echo $form->textField($model,'objectid_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cod_secc_3'); ?>
		<?php echo $form->textField($model,'cod_secc_3',array('size'=>60,'maxlength'=>254)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x4_m'); ?>
		<?php echo $form->textField($model,'x4_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x9_m'); ?>
		<?php echo $form->textField($model,'x9_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x14_m'); ?>
		<?php echo $form->textField($model,'x14_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x19_m'); ?>
		<?php echo $form->textField($model,'x19_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x24_m'); ?>
		<?php echo $form->textField($model,'x24_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x29_m'); ?>
		<?php echo $form->textField($model,'x29_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x34_m'); ?>
		<?php echo $form->textField($model,'x34_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x39_m'); ?>
		<?php echo $form->textField($model,'x39_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x44_m'); ?>
		<?php echo $form->textField($model,'x44_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x49_m'); ?>
		<?php echo $form->textField($model,'x49_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x54_m'); ?>
		<?php echo $form->textField($model,'x54_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x59_m'); ?>
		<?php echo $form->textField($model,'x59_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x64_m'); ?>
		<?php echo $form->textField($model,'x64_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x69_m'); ?>
		<?php echo $form->textField($model,'x69_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x74_m'); ?>
		<?php echo $form->textField($model,'x74_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x79_m'); ?>
		<?php echo $form->textField($model,'x79_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x84_m'); ?>
		<?php echo $form->textField($model,'x84_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x89_m'); ?>
		<?php echo $form->textField($model,'x89_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x94_m'); ?>
		<?php echo $form->textField($model,'x94_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x99_m'); ?>
		<?php echo $form->textField($model,'x99_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'x100_m'); ?>
		<?php echo $form->textField($model,'x100_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_m'); ?>
		<?php echo $form->textField($model,'total_m'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total'); ?>
		<?php echo $form->textField($model,'total'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'oid1_1'); ?>
		<?php echo $form->textField($model,'oid1_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'objectid_2'); ?>
		<?php echo $form->textField($model,'objectid_2'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cod_secc_4'); ?>
		<?php echo $form->textField($model,'cod_secc_4',array('size'=>60,'maxlength'=>254)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'total_ex_1'); ?>
		<?php echo $form->textField($model,'total_ex_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'africana_1'); ?>
		<?php echo $form->textField($model,'africana_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'american_1'); ?>
		<?php echo $form->textField($model,'american_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'asiatica_1'); ?>
		<?php echo $form->textField($model,'asiatica_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'europea_1'); ?>
		<?php echo $form->textField($model,'europea_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'resto_1'); ?>
		<?php echo $form->textField($model,'resto_1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_extran'); ?>
		<?php echo $form->textField($model,'p_extran'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_africa'); ?>
		<?php echo $form->textField($model,'p_africa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_americ'); ?>
		<?php echo $form->textField($model,'p_americ'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_asiati'); ?>
		<?php echo $form->textField($model,'p_asiati'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_europe'); ?>
		<?php echo $form->textField($model,'p_europe'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'p_resto'); ?>
		<?php echo $form->textField($model,'p_resto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'geom'); ?>
		<?php echo $form->textField($model,'geom',array('size'=>0,'maxlength'=>0)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'infancia'); ?>
		<?php echo $form->textField($model,'infancia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'juventud'); ?>
		<?php echo $form->textField($model,'juventud'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vejez'); ?>
		<?php echo $form->textField($model,'vejez'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'adultos_25_34'); ?>
		<?php echo $form->textField($model,'adultos_25_34'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'adultos_35_44'); ?>
		<?php echo $form->textField($model,'adultos_35_44'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'adultos_45_54'); ?>
		<?php echo $form->textField($model,'adultos_45_54'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'adultos_55_64'); ?>
		<?php echo $form->textField($model,'adultos_55_64'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'adultos_65_74'); ?>
		<?php echo $form->textField($model,'adultos_65_74'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tam_familia'); ?>
		<?php echo $form->textField($model,'tam_familia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nivel_estudios'); ?>
		<?php echo $form->textField($model,'nivel_estudios'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'porc_casados'); ?>
		<?php echo $form->textField($model,'porc_casados'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'size_viv'); ?>
		<?php echo $form->textField($model,'size_viv'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'rooms_viv'); ?>
		<?php echo $form->textField($model,'rooms_viv'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'price_viv'); ?>
		<?php echo $form->textField($model,'price_viv'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->