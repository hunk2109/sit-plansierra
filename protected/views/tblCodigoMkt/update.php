<?php
/* @var $this TblCodigoMktController */
/* @var $model TblCodigoMkt */

$this->breadcrumbs=array(
	'Tbl Codigo Mkts'=>array('index'),
	$model->codigo=>array('view','id'=>$model->codigo),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblCodigoMkt', 'url'=>array('index')),
	array('label'=>'Create TblCodigoMkt', 'url'=>array('create')),
	array('label'=>'View TblCodigoMkt', 'url'=>array('view', 'id'=>$model->codigo)),
	array('label'=>'Manage TblCodigoMkt', 'url'=>array('admin')),
);
?>

<h1>Update TblCodigoMkt <?php echo $model->codigo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>