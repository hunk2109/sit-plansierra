<?php
/* @var $this GeoIsopolygonController */
/* @var $model GeoIsopolygon */

$this->breadcrumbs=array(
	'Geo Isopolygons'=>array('index'),
	$model->gid,
);

$this->menu=array(
	array('label'=>'List GeoIsopolygon', 'url'=>array('index')),
	array('label'=>'Create GeoIsopolygon', 'url'=>array('create')),
	array('label'=>'Update GeoIsopolygon', 'url'=>array('update', 'id'=>$model->gid)),
	array('label'=>'Delete GeoIsopolygon', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->gid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GeoIsopolygon', 'url'=>array('admin')),
);
?>

<h1>View GeoIsopolygon #<?php echo $model->gid; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'gid',
		'iso',
		'id_hiper',
		'geom',
	),
)); ?>
