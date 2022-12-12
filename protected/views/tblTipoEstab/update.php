<?php
/* @var $this TblTipoEstabController */
/* @var $model TblTipoEstab */

$this->breadcrumbs=array(
	'Tbl Tipo Estabs'=>array('index'),
	$model->tipo=>array('view','id'=>$model->tipo),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblTipoEstab', 'url'=>array('index')),
	array('label'=>'Create TblTipoEstab', 'url'=>array('create')),
	array('label'=>'View TblTipoEstab', 'url'=>array('view', 'id'=>$model->tipo)),
	array('label'=>'Manage TblTipoEstab', 'url'=>array('admin')),
);
?>

<h1>Update TblTipoEstab <?php echo $model->tipo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>