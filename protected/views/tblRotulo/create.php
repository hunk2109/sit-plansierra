<?php
/* @var $this TblRotuloController */
/* @var $model TblRotulo */

$this->breadcrumbs=array(
	'Tbl Rotulos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblRotulo', 'url'=>array('index')),
	array('label'=>'Manage TblRotulo', 'url'=>array('admin')),
);
?>

<h1>Create TblRotulo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>