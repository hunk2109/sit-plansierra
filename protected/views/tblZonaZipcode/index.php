<?php
/* @var $this TblZonaZipcodeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Zona Zipcodes',
);

$this->menu=array(
	array('label'=>'Create TblZonaZipcode', 'url'=>array('create')),
	array('label'=>'Manage TblZonaZipcode', 'url'=>array('admin')),
);
?>

<h1>Tbl Zona Zipcodes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
