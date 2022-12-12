<?php
/* @var $this SeccionesController */
/* @var $model Secciones */

$this->breadcrumbs=array(
	'Secciones'=>array('index'),
	$model->gid=>array('view','id'=>$model->gid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Secciones', 'url'=>array('index')),
	array('label'=>'Create Secciones', 'url'=>array('create')),
	array('label'=>'View Secciones', 'url'=>array('view', 'id'=>$model->gid)),
	array('label'=>'Manage Secciones', 'url'=>array('admin')),
);
?>

<h1>Update Secciones <?php echo $model->gid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>