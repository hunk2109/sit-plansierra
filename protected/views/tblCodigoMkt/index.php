<?php
/* @var $this TblCodigoMktController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Codigo Mkts',
);

$this->menu=array(
	array('label'=>'Create TblCodigoMkt', 'url'=>array('create')),
	array('label'=>'Manage TblCodigoMkt', 'url'=>array('admin')),
);
?>

<h1>Tbl Codigo Mkts</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
