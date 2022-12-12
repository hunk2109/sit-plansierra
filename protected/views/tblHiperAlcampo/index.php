<?php
/* @var $this TblHiperAlcampoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Hiper Alcampos',
);

$this->menu=array(
	array('label'=>'Create TblHiperAlcampo', 'url'=>array('create')),
	array('label'=>'Manage TblHiperAlcampo', 'url'=>array('admin')),
);
?>

<h1>Tbl Hiper Alcampos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
