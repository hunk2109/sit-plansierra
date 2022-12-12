<?php
/* @var $this GeoCpController */
/* @var $model GeoCp */

$this->breadcrumbs=array(
	'Geo Cps'=>array('index'),
	$model->gid=>array('view','id'=>$model->gid),
	'Update',
);

$this->menu=array(
	array('label'=>'List GeoCp', 'url'=>array('index')),
	array('label'=>'Create GeoCp', 'url'=>array('create')),
	array('label'=>'View GeoCp', 'url'=>array('view', 'id'=>$model->gid)),
	array('label'=>'Manage GeoCp', 'url'=>array('admin')),
);
?>

<h1>Update GeoCp <?php echo $model->gid; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>