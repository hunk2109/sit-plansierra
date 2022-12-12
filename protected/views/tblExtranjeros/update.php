<?php
/* @var $this TblExtranjerosController */
/* @var $model TblExtranjeros */

$this->breadcrumbs=array(
	'Tbl Extranjeroses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblExtranjeros', 'url'=>array('index')),
	array('label'=>'Create TblExtranjeros', 'url'=>array('create')),
	array('label'=>'View TblExtranjeros', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TblExtranjeros', 'url'=>array('admin')),
);
?>

<h1>Update TblExtranjeros <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>