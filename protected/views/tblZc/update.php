<?php
/* @var $this TblZcController */
/* @var $model TblZc */

$this->breadcrumbs=array(
	'Tbl Zcs'=>array('index'),
	$model->cod_zipcode=>array('view','id'=>$model->cod_zipcode),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblZc', 'url'=>array('index')),
	array('label'=>'Create TblZc', 'url'=>array('create')),
	array('label'=>'View TblZc', 'url'=>array('view', 'id'=>$model->cod_zipcode)),
	array('label'=>'Manage TblZc', 'url'=>array('admin')),
);
?>

<h1>Update TblZc <?php echo $model->cod_zipcode; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>