<?php
/* @var $this SeccionesController */
/* @var $data Secciones */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('gid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->gid), array('view', 'id'=>$data->gid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cusec')); ?>:</b>
	<?php echo CHtml::encode($data->cusec); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cumun')); ?>:</b>
	<?php echo CHtml::encode($data->cumun); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('csec')); ?>:</b>
	<?php echo CHtml::encode($data->csec); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cdis')); ?>:</b>
	<?php echo CHtml::encode($data->cdis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cmun')); ?>:</b>
	<?php echo CHtml::encode($data->cmun); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cpro')); ?>:</b>
	<?php echo CHtml::encode($data->cpro); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('cca')); ?>:</b>
	<?php echo CHtml::encode($data->cca); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cudis')); ?>:</b>
	<?php echo CHtml::encode($data->cudis); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('clau2')); ?>:</b>
	<?php echo CHtml::encode($data->clau2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('npro')); ?>:</b>
	<?php echo CHtml::encode($data->npro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nca')); ?>:</b>
	<?php echo CHtml::encode($data->nca); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nmun')); ?>:</b>
	<?php echo CHtml::encode($data->nmun); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cnut0')); ?>:</b>
	<?php echo CHtml::encode($data->cnut0); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cnut1')); ?>:</b>
	<?php echo CHtml::encode($data->cnut1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cnut2')); ?>:</b>
	<?php echo CHtml::encode($data->cnut2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cnut3')); ?>:</b>
	<?php echo CHtml::encode($data->cnut3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shape_leng')); ?>:</b>
	<?php echo CHtml::encode($data->shape_leng); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shape_area')); ?>:</b>
	<?php echo CHtml::encode($data->shape_area); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('provmun')); ?>:</b>
	<?php echo CHtml::encode($data->provmun); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('distrito')); ?>:</b>
	<?php echo CHtml::encode($data->distrito); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seccion')); ?>:</b>
	<?php echo CHtml::encode($data->seccion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seccion_1')); ?>:</b>
	<?php echo CHtml::encode($data->seccion_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_secc_2')); ?>:</b>
	<?php echo CHtml::encode($data->cod_secc_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_secc')); ?>:</b>
	<?php echo CHtml::encode($data->cod_secc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oid_')); ?>:</b>
	<?php echo CHtml::encode($data->oid_); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('objectid')); ?>:</b>
	<?php echo CHtml::encode($data->objectid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_secc_1')); ?>:</b>
	<?php echo CHtml::encode($data->cod_secc_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_h')); ?>:</b>
	<?php echo CHtml::encode($data->x4_h); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x9_h')); ?>:</b>
	<?php echo CHtml::encode($data->x9_h); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x14_h')); ?>:</b>
	<?php echo CHtml::encode($data->x14_h); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x19_h')); ?>:</b>
	<?php echo CHtml::encode($data->x19_h); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x24_h')); ?>:</b>
	<?php echo CHtml::encode($data->x24_h); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x29_h')); ?>:</b>
	<?php echo CHtml::encode($data->x29_h); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x34_h')); ?>:</b>
	<?php echo CHtml::encode($data->x34_h); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x39_h')); ?>:</b>
	<?php echo CHtml::encode($data->x39_h); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x44_h')); ?>:</b>
	<?php echo CHtml::encode($data->x44_h); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x49_h')); ?>:</b>
	<?php echo CHtml::encode($data->x49_h); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x54_h')); ?>:</b>
	<?php echo CHtml::encode($data->x54_h); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x59_h')); ?>:</b>
	<?php echo CHtml::encode($data->x59_h); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x64_h')); ?>:</b>
	<?php echo CHtml::encode($data->x64_h); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x69_h')); ?>:</b>
	<?php echo CHtml::encode($data->x69_h); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x74_h')); ?>:</b>
	<?php echo CHtml::encode($data->x74_h); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x79_h')); ?>:</b>
	<?php echo CHtml::encode($data->x79_h); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x84_h')); ?>:</b>
	<?php echo CHtml::encode($data->x84_h); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x89_h')); ?>:</b>
	<?php echo CHtml::encode($data->x89_h); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x94_h')); ?>:</b>
	<?php echo CHtml::encode($data->x94_h); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x99_h')); ?>:</b>
	<?php echo CHtml::encode($data->x99_h); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x100_h')); ?>:</b>
	<?php echo CHtml::encode($data->x100_h); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_h')); ?>:</b>
	<?php echo CHtml::encode($data->total_h); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oid1')); ?>:</b>
	<?php echo CHtml::encode($data->oid1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('objectid_1')); ?>:</b>
	<?php echo CHtml::encode($data->objectid_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_secc_3')); ?>:</b>
	<?php echo CHtml::encode($data->cod_secc_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x4_m')); ?>:</b>
	<?php echo CHtml::encode($data->x4_m); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x9_m')); ?>:</b>
	<?php echo CHtml::encode($data->x9_m); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x14_m')); ?>:</b>
	<?php echo CHtml::encode($data->x14_m); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x19_m')); ?>:</b>
	<?php echo CHtml::encode($data->x19_m); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x24_m')); ?>:</b>
	<?php echo CHtml::encode($data->x24_m); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x29_m')); ?>:</b>
	<?php echo CHtml::encode($data->x29_m); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x34_m')); ?>:</b>
	<?php echo CHtml::encode($data->x34_m); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x39_m')); ?>:</b>
	<?php echo CHtml::encode($data->x39_m); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x44_m')); ?>:</b>
	<?php echo CHtml::encode($data->x44_m); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x49_m')); ?>:</b>
	<?php echo CHtml::encode($data->x49_m); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x54_m')); ?>:</b>
	<?php echo CHtml::encode($data->x54_m); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x59_m')); ?>:</b>
	<?php echo CHtml::encode($data->x59_m); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x64_m')); ?>:</b>
	<?php echo CHtml::encode($data->x64_m); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x69_m')); ?>:</b>
	<?php echo CHtml::encode($data->x69_m); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x74_m')); ?>:</b>
	<?php echo CHtml::encode($data->x74_m); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x79_m')); ?>:</b>
	<?php echo CHtml::encode($data->x79_m); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x84_m')); ?>:</b>
	<?php echo CHtml::encode($data->x84_m); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x89_m')); ?>:</b>
	<?php echo CHtml::encode($data->x89_m); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x94_m')); ?>:</b>
	<?php echo CHtml::encode($data->x94_m); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x99_m')); ?>:</b>
	<?php echo CHtml::encode($data->x99_m); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('x100_m')); ?>:</b>
	<?php echo CHtml::encode($data->x100_m); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_m')); ?>:</b>
	<?php echo CHtml::encode($data->total_m); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total')); ?>:</b>
	<?php echo CHtml::encode($data->total); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oid1_1')); ?>:</b>
	<?php echo CHtml::encode($data->oid1_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('objectid_2')); ?>:</b>
	<?php echo CHtml::encode($data->objectid_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cod_secc_4')); ?>:</b>
	<?php echo CHtml::encode($data->cod_secc_4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('total_ex_1')); ?>:</b>
	<?php echo CHtml::encode($data->total_ex_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('africana_1')); ?>:</b>
	<?php echo CHtml::encode($data->africana_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('american_1')); ?>:</b>
	<?php echo CHtml::encode($data->american_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('asiatica_1')); ?>:</b>
	<?php echo CHtml::encode($data->asiatica_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('europea_1')); ?>:</b>
	<?php echo CHtml::encode($data->europea_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('resto_1')); ?>:</b>
	<?php echo CHtml::encode($data->resto_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_extran')); ?>:</b>
	<?php echo CHtml::encode($data->p_extran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_africa')); ?>:</b>
	<?php echo CHtml::encode($data->p_africa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_americ')); ?>:</b>
	<?php echo CHtml::encode($data->p_americ); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_asiati')); ?>:</b>
	<?php echo CHtml::encode($data->p_asiati); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_europe')); ?>:</b>
	<?php echo CHtml::encode($data->p_europe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('p_resto')); ?>:</b>
	<?php echo CHtml::encode($data->p_resto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('geom')); ?>:</b>
	<?php echo CHtml::encode($data->geom); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('infancia')); ?>:</b>
	<?php echo CHtml::encode($data->infancia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('juventud')); ?>:</b>
	<?php echo CHtml::encode($data->juventud); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vejez')); ?>:</b>
	<?php echo CHtml::encode($data->vejez); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adultos_25_34')); ?>:</b>
	<?php echo CHtml::encode($data->adultos_25_34); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adultos_35_44')); ?>:</b>
	<?php echo CHtml::encode($data->adultos_35_44); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adultos_45_54')); ?>:</b>
	<?php echo CHtml::encode($data->adultos_45_54); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adultos_55_64')); ?>:</b>
	<?php echo CHtml::encode($data->adultos_55_64); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adultos_65_74')); ?>:</b>
	<?php echo CHtml::encode($data->adultos_65_74); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tam_familia')); ?>:</b>
	<?php echo CHtml::encode($data->tam_familia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nivel_estudios')); ?>:</b>
	<?php echo CHtml::encode($data->nivel_estudios); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('porc_casados')); ?>:</b>
	<?php echo CHtml::encode($data->porc_casados); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('size_viv')); ?>:</b>
	<?php echo CHtml::encode($data->size_viv); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rooms_viv')); ?>:</b>
	<?php echo CHtml::encode($data->rooms_viv); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price_viv')); ?>:</b>
	<?php echo CHtml::encode($data->price_viv); ?>
	<br />

	*/ ?>

</div>