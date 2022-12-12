<?php
/* @var $this GeoCpController */
/* @var $model GeoCp */

$this->breadcrumbs=array(
	'Geo Cps'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GeoCp', 'url'=>array('index')),
	array('label'=>'Manage GeoCp', 'url'=>array('admin')),
);
?>

<h1>Create GeoCp</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>