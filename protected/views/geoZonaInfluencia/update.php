<?php
/* @var $this GeoZonaInfluenciaController */
/* @var $model GeoZonaInfluencia */

$this->breadcrumbs=array(
	'Geo Zona Influencias'=>array('index'),
	$model->gid=>array('view','id'=>$model->gid),
	'Update',
);

$this->menu=array(
	array('label'=>'List GeoZonaInfluencia', 'url'=>array('index')),
	array('label'=>'Create GeoZonaInfluencia', 'url'=>array('create')),
	array('label'=>'View GeoZonaInfluencia', 'url'=>array('view', 'id'=>$model->gid)),
	array('label'=>'Manage GeoZonaInfluencia', 'url'=>array('admin')),
);
?>

<h1>Update GeoZonaInfluencia <?php echo $model->gid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>