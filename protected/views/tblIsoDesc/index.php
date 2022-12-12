<?php
/* @var $this TblIsoDescController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Iso Descs',
);

$this->menu=array(
	array('label'=>'Create TblIsoDesc', 'url'=>array('create')),
	array('label'=>'Manage TblIsoDesc', 'url'=>array('admin')),
);
?>

<h1>Tbl Iso Descs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
