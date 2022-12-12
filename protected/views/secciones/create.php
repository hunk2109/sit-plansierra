<?php
/* @var $this SeccionesController */
/* @var $model Secciones */

$this->breadcrumbs=array(
	'Secciones'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Secciones', 'url'=>array('index')),
	array('label'=>'Manage Secciones', 'url'=>array('admin')),
);
?>

<h1>Create Secciones</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>