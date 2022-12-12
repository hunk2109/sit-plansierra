<?php
/* @var $this GeoIsopolygonController */
/* @var $model GeoIsopolygon */

$this->breadcrumbs=array(
	'Geo Isopolygons'=>array('index'),
	$model->gid=>array('view','id'=>$model->gid),
	'Update',
);

$this->menu=array(
	array('label'=>'List GeoIsopolygon', 'url'=>array('index')),
	array('label'=>'Create GeoIsopolygon', 'url'=>array('create')),
	array('label'=>'View GeoIsopolygon', 'url'=>array('view', 'id'=>$model->gid)),
	array('label'=>'Manage GeoIsopolygon', 'url'=>array('admin')),
);
?>

<h1>Update GeoIsopolygon <?php echo $model->gid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>