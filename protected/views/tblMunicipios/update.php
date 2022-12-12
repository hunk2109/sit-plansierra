<?php
/* @var $this TblMunicipiosController */
/* @var $model TblMunicipios */

$this->breadcrumbs=array(
	'Tbl Municipioses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblMunicipios', 'url'=>array('index')),
	array('label'=>'Create TblMunicipios', 'url'=>array('create')),
	array('label'=>'View TblMunicipios', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TblMunicipios', 'url'=>array('admin')),
);
?>

<h1>Update TblMunicipios <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>