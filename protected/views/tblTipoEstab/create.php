<?php
/* @var $this TblTipoEstabController */
/* @var $model TblTipoEstab */

$this->breadcrumbs=array(
	'Tbl Tipo Estabs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblTipoEstab', 'url'=>array('index')),
	array('label'=>'Manage TblTipoEstab', 'url'=>array('admin')),
);
?>

<h1>Create TblTipoEstab</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>