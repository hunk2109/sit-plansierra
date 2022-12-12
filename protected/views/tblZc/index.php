<?php
/* @var $this TblZcController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Zcs',
);

$this->menu=array(
	array('label'=>'Create TblZc', 'url'=>array('create')),
	array('label'=>'Manage TblZc', 'url'=>array('admin')),
);
?>

<h1>Tbl Zcs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
