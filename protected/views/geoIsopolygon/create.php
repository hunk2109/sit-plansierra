<?php
/* @var $this GeoIsopolygonController */
/* @var $model GeoIsopolygon */

$this->breadcrumbs=array(
	'Geo Isopolygons'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GeoIsopolygon', 'url'=>array('index')),
	array('label'=>'Manage GeoIsopolygon', 'url'=>array('admin')),
);
?>

<h1>Create GeoIsopolygon</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>