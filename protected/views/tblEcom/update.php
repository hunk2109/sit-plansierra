<?php
/* @var $this TblEcomController */
/* @var $model TblEcom */

$this->breadcrumbs=array(
	'Tbl Ecoms'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblEcom', 'url'=>array('index')),
	array('label'=>'Create TblEcom', 'url'=>array('create')),
	array('label'=>'View TblEcom', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TblEcom', 'url'=>array('admin')),
);
?>

<h1>Update TblEcom <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>