<?php
/* @var $this TblEtiquetaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Etiquetas',
);

$this->menu=array(
	array('label'=>'Create TblEtiqueta', 'url'=>array('create')),
	array('label'=>'Manage TblEtiqueta', 'url'=>array('admin')),
);
?>

<h1>Tbl Etiquetas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
