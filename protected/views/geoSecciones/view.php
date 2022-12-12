<?php
/* @var $this GeoSeccionesController */
/* @var $model GeoSecciones */

$this->breadcrumbs=array(
	'Geo Secciones'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List GeoSecciones', 'url'=>array('index')),
	array('label'=>'Create GeoSecciones', 'url'=>array('create')),
	array('label'=>'Update GeoSecciones', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GeoSecciones', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GeoSecciones', 'url'=>array('admin')),
);
?>

<h1>View GeoSecciones #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'geom',
		'cod_secc',
		'cod_mun',
		'pob_0005',
		'pob_0514',
		'pob_1519',
		'pob_2029',
		'pob_2965',
		'pob_6599',
		'pobex_afric',
		'pobex_ameri',
		'pobex_asiat',
		'pobex_europ',
		'pobex_resto',
		'id',
	),
)); ?>
