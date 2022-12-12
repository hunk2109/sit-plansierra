<?php
/* @var $this TblIdEncuestaZcController */
/* @var $model TblIdEncuestaZc */

$this->breadcrumbs=array(
	'Tbl Id Encuesta Zcs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblIdEncuestaZc', 'url'=>array('index')),
	array('label'=>'Manage TblIdEncuestaZc', 'url'=>array('admin')),
);
?>

<h1>Create TblIdEncuestaZc</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>