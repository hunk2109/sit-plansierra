<?php
/* @var $this GeoSeccionesController */
/* @var $model GeoSecciones */

$this->breadcrumbs=array(
	'Geo Secciones'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GeoSecciones', 'url'=>array('index')),
	array('label'=>'Create GeoSecciones', 'url'=>array('create')),
	array('label'=>'View GeoSecciones', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage GeoSecciones', 'url'=>array('admin')),
);
?>

<h1>Update GeoSecciones <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>