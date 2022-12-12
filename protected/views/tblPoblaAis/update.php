<?php
/* @var $this TblPoblaAisController */
/* @var $model TblPoblaAis */

$this->breadcrumbs=array(
	'Tbl Pobla Aises'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblPoblaAis', 'url'=>array('index')),
	array('label'=>'Create TblPoblaAis', 'url'=>array('create')),
	array('label'=>'View TblPoblaAis', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TblPoblaAis', 'url'=>array('admin')),
);
?>

<h1>Update TblPoblaAis <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>