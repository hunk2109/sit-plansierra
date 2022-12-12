<?php
/* @var $this GeoSeccionesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Geo Secciones',
);

$this->menu=array(
	array('label'=>'Create GeoSecciones', 'url'=>array('create')),
	array('label'=>'Manage GeoSecciones', 'url'=>array('admin')),
);
?>

<h1>Geo Secciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
