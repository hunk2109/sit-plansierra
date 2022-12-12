<?php
/* @var $this TblEncuestaInfluenciaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Encuesta Influencias',
);

$this->menu=array(
	array('label'=>'Create TblEncuestaInfluencia', 'url'=>array('create')),
	array('label'=>'Manage TblEncuestaInfluencia', 'url'=>array('admin')),
);
?>

<h1>Tbl Encuesta Influencias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
