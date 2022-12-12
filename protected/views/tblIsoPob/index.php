<?php
/* @var $this TblIsoPobController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Iso Pobs',
);

$this->menu=array(
	array('label'=>'Create TblIsoPob', 'url'=>array('create')),
	array('label'=>'Manage TblIsoPob', 'url'=>array('admin')),
);
?>

<h1>Tbl Iso Pobs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
