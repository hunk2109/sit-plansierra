<?php
/* @var $this TblClFuentesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Cl Fuentes',
);

$this->menu=array(
	array('label'=>'Create TblClFuentes', 'url'=>array('create')),
	array('label'=>'Manage TblClFuentes', 'url'=>array('admin')),
);
?>

<h1>Tbl Cl Fuentes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
