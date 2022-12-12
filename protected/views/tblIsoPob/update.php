<?php
/* @var $this TblIsoPobController */
/* @var $model TblIsoPob */

$this->breadcrumbs=array(
	'Tbl Iso Pobs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblIsoPob', 'url'=>array('index')),
	array('label'=>'Create TblIsoPob', 'url'=>array('create')),
	array('label'=>'View TblIsoPob', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TblIsoPob', 'url'=>array('admin')),
);
?>

<h1>Update TblIsoPob <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>