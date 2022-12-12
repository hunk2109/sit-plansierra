<?php
/* @var $this GeoIsopolygonController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Geo Isopolygons',
);

$this->menu=array(
	array('label'=>'Create GeoIsopolygon', 'url'=>array('create')),
	array('label'=>'Manage GeoIsopolygon', 'url'=>array('admin')),
);
?>

<h1>Geo Isopolygons</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
