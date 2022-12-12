<?php
/* @var $this TblPoblaAisController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Pobla Aises',
);

$this->menu=array(
	array('label'=>'Create TblPoblaAis', 'url'=>array('create')),
	array('label'=>'Manage TblPoblaAis', 'url'=>array('admin')),
);
?>

<h1>Tbl Pobla Aises</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
