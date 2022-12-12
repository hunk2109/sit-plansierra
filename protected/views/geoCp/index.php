<?php
/* @var $this GeoCpController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Geo Cps',
);

$this->menu=array(
	array('label'=>'Create GeoCp', 'url'=>array('create')),
	array('label'=>'Manage GeoCp', 'url'=>array('admin')),
);
?>

<h1>Geo Cps</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
