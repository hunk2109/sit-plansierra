<?php
/* @var $this GeoIsolinesController */
/* @var $model GeoIsolines */

$this->breadcrumbs=array(
	'Geo Isolines'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GeoIsolines', 'url'=>array('index')),
	array('label'=>'Manage GeoIsolines', 'url'=>array('admin')),
);
?>

<h1>Create GeoIsolines</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>