<?php
/* @var $this TblAuxExtranjerosController */
/* @var $model TblAuxExtranjeros */

$this->breadcrumbs=array(
	'Tbl Aux Extranjeroses'=>array('index'),
	$model->id_nacionalidad=>array('view','id'=>$model->id_nacionalidad),
	'Update',
);

$this->menu=array(
	array('label'=>'List TblAuxExtranjeros', 'url'=>array('index')),
	array('label'=>'Create TblAuxExtranjeros', 'url'=>array('create')),
	array('label'=>'View TblAuxExtranjeros', 'url'=>array('view', 'id'=>$model->id_nacionalidad)),
	array('label'=>'Manage TblAuxExtranjeros', 'url'=>array('admin')),
);
?>

<h1>Update TblAuxExtranjeros <?php echo $model->id_nacionalidad; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>