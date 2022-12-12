<?php
/* @var $this TblExtranjerosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Extranjeroses',
);

$this->menu=array(
	array('label'=>'Create TblExtranjeros', 'url'=>array('create')),
	array('label'=>'Manage TblExtranjeros', 'url'=>array('admin')),
);
?>

<h1>Tbl Extranjeroses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
