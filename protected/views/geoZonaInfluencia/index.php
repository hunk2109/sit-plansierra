<?php
/* @var $this GeoZonaInfluenciaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Geo Zona Influencias',
);

$this->menu=array(
	array('label'=>'Create GeoZonaInfluencia', 'url'=>array('create')),
	array('label'=>'Manage GeoZonaInfluencia', 'url'=>array('admin')),
);
?>

<h1>Geo Zona Influencias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
