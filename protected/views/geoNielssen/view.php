<?php
/* @var $this GeoNielssenController */
/* @var $model GeoNielssen */

$this->breadcrumbs=array(
	'Geo Nielssens'=>array('index'),
	$model->codigo_nielssen,
);

$this->menu=array(
	array('label'=>'List GeoNielssen', 'url'=>array('index')),
	array('label'=>'Create GeoNielssen', 'url'=>array('create')),
	array('label'=>'Update GeoNielssen', 'url'=>array('update', 'id'=>$model->codigo_nielssen)),
	array('label'=>'Delete GeoNielssen', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->codigo_nielssen),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GeoNielssen', 'url'=>array('admin')),
);
?>

<h1>View GeoNielssen #<?php echo $model->codigo_nielssen; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codigo_nielssen',
		'grupo',
		'cadena',
		'id_rotulo',
		'abrev',
		'direccion',
		'numero',
		'provincia',
		'municipio',
		'cp',
		'cajas',
		'cajas_scan',
		'sala_ventas',
		'apertura',
		'ccomercial',
		'ccaa',
		'tipo',
		'geom',
		'fecha_baja',
		'geo_precision',
	),
)); ?>
