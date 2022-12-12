<?php
/* @var $this TblIdEncuestaController */
/* @var $model TblIdEncuesta */

$this->breadcrumbs=array(
	'Tbl Id Encuestas'=>array('index'),
	$model->id_encuesta=>array('view','id'=>$model->id_encuesta),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblIdEncuesta', 'url'=>array('index')),
	array('label'=>'Create TblIdEncuesta', 'url'=>array('create')),
	array('label'=>'View TblIdEncuesta', 'url'=>array('view', 'id'=>$model->id_encuesta)),
	array('label'=>'Manage TblIdEncuesta', 'url'=>array('admin')),
);
?>

<h1>Update TblIdEncuesta <?php echo $model->id_encuesta; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>