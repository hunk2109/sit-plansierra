<?php
/* @var $this TblTipoEstabController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Tipo Estabs',
);

$this->menu=array(
	array('label'=>'Create TblTipoEstab', 'url'=>array('create')),
	array('label'=>'Manage TblTipoEstab', 'url'=>array('admin')),
);
?>

<h1>Tbl Tipo Estabs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
