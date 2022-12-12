<?php
/* @var $this TblMercadoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Mercados',
);

$this->menu=array(
	array('label'=>'Create TblMercado', 'url'=>array('create')),
	array('label'=>'Manage TblMercado', 'url'=>array('admin')),
);
?>

<h1>Tbl Mercados</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
