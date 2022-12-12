<?php
/* @var $this TblMunicipiosController */
/* @var $model TblMunicipios */

$this->breadcrumbs=array(
	'Tbl Municipioses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblMunicipios', 'url'=>array('index')),
	array('label'=>'Manage TblMunicipios', 'url'=>array('admin')),
);
?>

<h1>Create TblMunicipios</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>