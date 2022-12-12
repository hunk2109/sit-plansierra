<?php
/* @var $this GeoZonaInfluenciaController */
/* @var $model GeoZonaInfluencia */

$this->breadcrumbs=array(
	'Geo Zona Influencias'=>array('index'),
	$model->gid,
);

$this->menu=array(
	array('label'=>'List GeoZonaInfluencia', 'url'=>array('index')),
	array('label'=>'Create GeoZonaInfluencia', 'url'=>array('create')),
	array('label'=>'Update GeoZonaInfluencia', 'url'=>array('update', 'id'=>$model->gid)),
	array('label'=>'Delete GeoZonaInfluencia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->gid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GeoZonaInfluencia', 'url'=>array('admin')),
);
?>

<h1>View GeoZonaInfluencia #<?php echo $model->gid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'gid',
		'loc',
		'geom',
	),
)); ?>
