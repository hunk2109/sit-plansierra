<?php
/* @var $this TblZipcodeMercadosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Zipcode Mercadoses',
);

$this->menu=array(
	array('label'=>'Create TblZipcodeMercados', 'url'=>array('create')),
	array('label'=>'Manage TblZipcodeMercados', 'url'=>array('admin')),
);
?>

<h1>Tbl Zipcode Mercadoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
