<?php
/* @var $this TblAuxExtranjerosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Aux Extranjeroses',
);

$this->menu=array(
	array('label'=>'Create TblAuxExtranjeros', 'url'=>array('create')),
	array('label'=>'Manage TblAuxExtranjeros', 'url'=>array('admin')),
);
?>

<h1>Tbl Aux Extranjeroses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
