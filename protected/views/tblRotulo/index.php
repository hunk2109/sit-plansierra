<?php
/* @var $this TblRotuloController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Rotulos',
);

$this->menu=array(
	array('label'=>'Create TblRotulo', 'url'=>array('create')),
	array('label'=>'Manage TblRotulo', 'url'=>array('admin')),
);
?>

<h1>Tbl Rotulos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
