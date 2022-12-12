<?php
/* @var $this TblPoblaAisController */
/* @var $model TblPoblaAis */

$this->breadcrumbs=array(
	'Tbl Pobla Aises'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblPoblaAis', 'url'=>array('index')),
	array('label'=>'Manage TblPoblaAis', 'url'=>array('admin')),
);
?>

<h1>Create TblPoblaAis</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>