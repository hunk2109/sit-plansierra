<?php
/* @var $this TblIdEncuestaZcController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Id Encuesta Zcs',
);

$this->menu=array(
	array('label'=>'Create TblIdEncuestaZc', 'url'=>array('create')),
	array('label'=>'Manage TblIdEncuestaZc', 'url'=>array('admin')),
);
?>

<h1>Tbl Id Encuesta Zcs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
