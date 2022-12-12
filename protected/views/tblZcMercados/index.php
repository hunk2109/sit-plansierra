<?php
/* @var $this TblZcMercadosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Zc Mercadoses',
);

$this->menu=array(
	array('label'=>'Create TblZcMercados', 'url'=>array('create')),
	array('label'=>'Manage TblZcMercados', 'url'=>array('admin')),
);
?>

<h1>Tbl Zc Mercadoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
