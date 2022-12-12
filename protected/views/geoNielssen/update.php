<?php
/* @var $this GeoNielssenController */
/* @var $model GeoNielssen */

$this->breadcrumbs=array(
	'Geo Nielssens'=>array('index'),
	$model->codigo_nielssen=>array('view','id'=>$model->codigo_nielssen),
	'Update',
);

$this->menu=array(
	array('label'=>'List GeoNielssen', 'url'=>array('index')),
	array('label'=>'Create GeoNielssen', 'url'=>array('create')),
	array('label'=>'View GeoNielssen', 'url'=>array('view', 'id'=>$model->codigo_nielssen)),
	array('label'=>'Manage GeoNielssen', 'url'=>array('admin')),
);
?>

<h1>Update GeoNielssen <?php echo $model->codigo_nielssen; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>