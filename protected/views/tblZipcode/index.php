<?php
/* @var $this TblZipcodeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Zipcodes',
);

$this->menu=array(
	array('label'=>'Create TblZipcode', 'url'=>array('create')),
	array('label'=>'Manage TblZipcode', 'url'=>array('admin')),
);
?>

<h1>Tbl Zipcodes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
