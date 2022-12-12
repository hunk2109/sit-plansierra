<?php
/* @var $this TblEcomController */
/* @var $model TblEcom */

$this->breadcrumbs=array(
	'Tbl Ecoms'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblEcom', 'url'=>array('index')),
	array('label'=>'Manage TblEcom', 'url'=>array('admin')),
);
?>

<h1>Create TblEcom</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>