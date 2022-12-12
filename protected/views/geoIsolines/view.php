<?php
/* @var $this GeoIsolinesController */
/* @var $model GeoIsolines */

$this->breadcrumbs=array(
	'Geo Isolines'=>array('index'),
	$model->gid,
);

$this->menu=array(
	array('label'=>'List GeoIsolines', 'url'=>array('index')),
	array('label'=>'Create GeoIsolines', 'url'=>array('create')),
	array('label'=>'Update GeoIsolines', 'url'=>array('update', 'id'=>$model->gid)),
	array('label'=>'Delete GeoIsolines', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->gid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GeoIsolines', 'url'=>array('admin')),
);
?>

<h1>View GeoIsolines #<?php echo $model->gid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'gid',
		'iso',
		'id_hiper',
		'geom',
	),
)); ?>
