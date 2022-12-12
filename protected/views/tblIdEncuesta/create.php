<?php
/* @var $this TblIdEncuestaController */
/* @var $model TblIdEncuesta */

$this->breadcrumbs=array(
	'Tbl Id Encuestas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblIdEncuesta', 'url'=>array('index')),
	array('label'=>'Manage TblIdEncuesta', 'url'=>array('admin')),
);
?>

<h1>Create TblIdEncuesta</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>