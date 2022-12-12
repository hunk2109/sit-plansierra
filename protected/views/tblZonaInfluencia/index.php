<?php
/* @var $this TblZonaInfluenciaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Zona Influencias',
);

$this->menu=array(
	array('label'=>'Create TblZonaInfluencia', 'url'=>array('create')),
	array('label'=>'Manage TblZonaInfluencia', 'url'=>array('admin')),
);
?>

<h1>Tbl Zona Influencias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
