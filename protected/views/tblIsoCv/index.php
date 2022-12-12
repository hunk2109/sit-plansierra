<?php
/* @var $this TblIsoCvController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Iso Cvs',
);

$this->menu=array(
	array('label'=>'Create TblIsoCv', 'url'=>array('create')),
	array('label'=>'Manage TblIsoCv', 'url'=>array('admin')),
);
?>

<h1>Tbl Iso Cvs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
