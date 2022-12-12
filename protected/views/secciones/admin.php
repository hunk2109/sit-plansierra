<?php
/* @var $this SeccionesController */
/* @var $model Secciones */

$this->breadcrumbs=array(
	'Secciones'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Secciones', 'url'=>array('index')),
	array('label'=>'Create Secciones', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('secciones-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Secciones</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'secciones-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'gid',
		'cusec',
		'cumun',
		'csec',
		'cdis',
		'cmun',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
