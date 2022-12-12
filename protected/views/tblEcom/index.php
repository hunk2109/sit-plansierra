<?php
/* @var $this TblEcomController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Ecoms',
);

$this->menu=array(
	array('label'=>'Create TblEcom', 'url'=>array('create')),
	array('label'=>'Manage TblEcom', 'url'=>array('admin')),
);
?>

<h1>Tbl Ecoms</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
