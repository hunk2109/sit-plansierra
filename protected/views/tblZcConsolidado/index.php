<?php
/* @var $this TblZcConsolidadoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Zc Consolidados',
);

$this->menu=array(
	array('label'=>'Create TblZcConsolidado', 'url'=>array('create')),
	array('label'=>'Manage TblZcConsolidado', 'url'=>array('admin')),
);
?>

<h1>Tbl Zc Consolidados</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
