<?php
/* @var $this TblIdEncuestaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Id Encuestas',
);

$this->menu=array(
	array('label'=>'Create TblIdEncuesta', 'url'=>array('create')),
	array('label'=>'Manage TblIdEncuesta', 'url'=>array('admin')),
);
?>

<h1>Tbl Id Encuestas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
