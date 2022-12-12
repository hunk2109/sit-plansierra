<?php
/* @var $this GeoNielssenController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Geo Nielssens',
);

$this->menu=array(
	array('label'=>'Create GeoNielssen', 'url'=>array('create')),
	array('label'=>'Manage GeoNielssen', 'url'=>array('admin')),
);
?>

<h1>Geo Nielssens</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
