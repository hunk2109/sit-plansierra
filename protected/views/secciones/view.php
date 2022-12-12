<?php
/* @var $this SeccionesController */
/* @var $model Secciones */

$this->breadcrumbs=array(
	'Secciones'=>array('index'),
	$model->gid,
);

$this->menu=array(
	array('label'=>'List Secciones', 'url'=>array('index')),
	array('label'=>'Create Secciones', 'url'=>array('create')),
	array('label'=>'Update Secciones', 'url'=>array('update', 'id'=>$model->gid)),
	array('label'=>'Delete Secciones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->gid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Secciones', 'url'=>array('admin')),
);
?>

<h1>View Secciones #<?php echo $model->gid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'gid',
		'cusec',
		'cumun',
		'csec',
		'cdis',
		'cmun',
		'cpro',
		'cca',
		'cudis',
		'clau2',
		'npro',
		'nca',
		'nmun',
		'cnut0',
		'cnut1',
		'cnut2',
		'cnut3',
		'shape_leng',
		'shape_area',
		'provmun',
		'distrito',
		'seccion',
		'seccion_1',
		'cod_secc_2',
		'cod_secc',
		'oid_',
		'objectid',
		'cod_secc_1',
		'x4_h',
		'x9_h',
		'x14_h',
		'x19_h',
		'x24_h',
		'x29_h',
		'x34_h',
		'x39_h',
		'x44_h',
		'x49_h',
		'x54_h',
		'x59_h',
		'x64_h',
		'x69_h',
		'x74_h',
		'x79_h',
		'x84_h',
		'x89_h',
		'x94_h',
		'x99_h',
		'x100_h',
		'total_h',
		'oid1',
		'objectid_1',
		'cod_secc_3',
		'x4_m',
		'x9_m',
		'x14_m',
		'x19_m',
		'x24_m',
		'x29_m',
		'x34_m',
		'x39_m',
		'x44_m',
		'x49_m',
		'x54_m',
		'x59_m',
		'x64_m',
		'x69_m',
		'x74_m',
		'x79_m',
		'x84_m',
		'x89_m',
		'x94_m',
		'x99_m',
		'x100_m',
		'total_m',
		'total',
		'oid1_1',
		'objectid_2',
		'cod_secc_4',
		'total_ex_1',
		'africana_1',
		'american_1',
		'asiatica_1',
		'europea_1',
		'resto_1',
		'p_extran',
		'p_africa',
		'p_americ',
		'p_asiati',
		'p_europe',
		'p_resto',
		'geom',
		'infancia',
		'juventud',
		'vejez',
		'adultos_25_34',
		'adultos_35_44',
		'adultos_45_54',
		'adultos_55_64',
		'adultos_65_74',
		'tam_familia',
		'nivel_estudios',
		'porc_casados',
		'size_viv',
		'rooms_viv',
		'price_viv',
	),
)); ?>
