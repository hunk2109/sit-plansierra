<?php
/* @var $this TblClRegistrosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Cl Registroses',
);

$this->menu=array(
	array('label'=>'Create TblClRegistros', 'url'=>array('create')),
	array('label'=>'Manage TblClRegistros', 'url'=>array('admin')),
);
?>

<h1>Tbl Cl Registros</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
