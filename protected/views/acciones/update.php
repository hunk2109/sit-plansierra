<?php
/* @var $this AccionesController */
/* @var $model Acciones */

$this->breadcrumbs=array(
	'Acciones'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Acciones', 'url'=>array('index')),
	array('label'=>'Create Acciones', 'url'=>array('create')),
	array('label'=>'View Acciones', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Acciones', 'url'=>array('admin')),
);
?>

<h1>Update Acciones <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>