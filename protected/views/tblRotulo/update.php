<?php
/* @var $this TblRotuloController */
/* @var $model TblRotulo */

$this->breadcrumbs=array(
	'Tbl Rotulos'=>array('index'),
	$model->id_rotulo=>array('view','id'=>$model->id_rotulo),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblRotulo', 'url'=>array('index')),
	array('label'=>'Create TblRotulo', 'url'=>array('create')),
	array('label'=>'View TblRotulo', 'url'=>array('view', 'id'=>$model->id_rotulo)),
	array('label'=>'Manage TblRotulo', 'url'=>array('admin')),
);
?>

<h1>Update TblRotulo <?php echo $model->id_rotulo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>