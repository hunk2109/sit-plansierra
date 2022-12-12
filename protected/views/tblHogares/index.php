<?php
/* @var $this TblHogaresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Hogares',
);

$this->menu=array(
	array('label'=>'Create TblHogares', 'url'=>array('create')),
	array('label'=>'Manage TblHogares', 'url'=>array('admin')),
);
?>

<h1>Tbl Hogares</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
