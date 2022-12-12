<?php
/* @var $this GeoNielssenController */
/* @var $model GeoNielssen */

$this->breadcrumbs=array(
	'Geo Nielssens'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GeoNielssen', 'url'=>array('index')),
	array('label'=>'Manage GeoNielssen', 'url'=>array('admin')),
);
?>

<h1>Create GeoNielssen</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>