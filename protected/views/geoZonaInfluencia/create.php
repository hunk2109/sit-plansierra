<?php
/* @var $this GeoZonaInfluenciaController */
/* @var $model GeoZonaInfluencia */

$this->breadcrumbs=array(
	'Geo Zona Influencias'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GeoZonaInfluencia', 'url'=>array('index')),
	array('label'=>'Manage GeoZonaInfluencia', 'url'=>array('admin')),
);
?>

<h1>Create GeoZonaInfluencia</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>