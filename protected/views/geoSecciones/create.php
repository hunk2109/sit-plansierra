<?php
/* @var $this GeoSeccionesController */
/* @var $model GeoSecciones */

$this->breadcrumbs=array(
	'Geo Secciones'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GeoSecciones', 'url'=>array('index')),
	array('label'=>'Manage GeoSecciones', 'url'=>array('admin')),
);
?>

<h1>Create GeoSecciones</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>