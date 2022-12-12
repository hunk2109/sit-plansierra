<?php
/* @var $this TblIsoCvController */
/* @var $model TblIsoCv */

$this->breadcrumbs=array(
	'Tbl Iso Cvs'=>array('index'),
	$model->id_iso_cv_zc=>array('view','id'=>$model->id_iso_cv_zc),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblIsoCv', 'url'=>array('index')),
	array('label'=>'Create TblIsoCv', 'url'=>array('create')),
	array('label'=>'View TblIsoCv', 'url'=>array('view', 'id'=>$model->id_iso_cv_zc)),
	array('label'=>'Manage TblIsoCv', 'url'=>array('admin')),
);
?>

<h1>Update TblIsoCv <?php echo $model->id_iso_cv_zc; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>