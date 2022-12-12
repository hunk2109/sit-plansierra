<?php
/* @var $this GeoIsolinesController */
/* @var $model GeoIsolines */

$this->breadcrumbs=array(
	'Geo Isolines'=>array('index'),
	$model->gid=>array('view','id'=>$model->gid),
	'Update',
);

$this->menu=array(
	array('label'=>'List GeoIsolines', 'url'=>array('index')),
	array('label'=>'Create GeoIsolines', 'url'=>array('create')),
	array('label'=>'View GeoIsolines', 'url'=>array('view', 'id'=>$model->gid)),
	array('label'=>'Manage GeoIsolines', 'url'=>array('admin')),
);
?>

<h1>Update GeoIsolines <?php echo $model->gid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>