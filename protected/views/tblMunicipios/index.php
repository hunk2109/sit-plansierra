<?php
/* @var $this TblMunicipiosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Municipioses',
);

$this->menu=array(
	array('label'=>'Create TblMunicipios', 'url'=>array('create')),
	array('label'=>'Manage TblMunicipios', 'url'=>array('admin')),
);
?>

<h1>Tbl Municipioses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
