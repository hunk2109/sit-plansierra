<?php
/* @var $this TblClRegistrosController */
/* @var $model TblClRegistros */

$this->breadcrumbs=array(
	'Tbl Cl Registroses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblClRegistros', 'url'=>array('index')),
	array('label'=>'Create TblClRegistros', 'url'=>array('create')),
	array('label'=>'View TblClRegistros', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TblClRegistros', 'url'=>array('admin')),
);
?>

<h1>Update TblClRegistros <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>