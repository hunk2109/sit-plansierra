<?php
/* @var $this SeccionesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Secciones',
);

$this->menu=array(
	array('label'=>'Create Secciones', 'url'=>array('create')),
	array('label'=>'Manage Secciones', 'url'=>array('admin')),
);
?>

<h1>Secciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
