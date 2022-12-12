<?php
/* @var $this TblIdEncuestaZcController */
/* @var $model TblIdEncuestaZc */

$this->breadcrumbs=array(
	'Tbl Id Encuesta Zcs'=>array('index'),
	$model->id_encuesta_zc=>array('view','id'=>$model->id_encuesta_zc),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblIdEncuestaZc', 'url'=>array('index')),
	array('label'=>'Create TblIdEncuestaZc', 'url'=>array('create')),
	array('label'=>'View TblIdEncuestaZc', 'url'=>array('view', 'id'=>$model->id_encuesta_zc)),
	array('label'=>'Manage TblIdEncuestaZc', 'url'=>array('admin')),
);
?>

<h1>Update TblIdEncuestaZc <?php echo $model->id_encuesta_zc; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>