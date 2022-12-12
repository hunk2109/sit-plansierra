<?php
/* @var $this GeoIsolinesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Geo Isolines',
);

$this->menu=array(
	array('label'=>'Create GeoIsolines', 'url'=>array('create')),
	array('label'=>'Manage GeoIsolines', 'url'=>array('admin')),
);
?>

<h1>Geo Isolines</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
