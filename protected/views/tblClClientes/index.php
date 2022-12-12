<?php
/* @var $this TblClClientesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Cl Clientes',
);

$this->menu=array(
	array('label'=>'Create TblClClientes', 'url'=>array('create')),
	array('label'=>'Manage TblClClientes', 'url'=>array('admin')),
);
?>

<h1>Tbl Cl Clientes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
