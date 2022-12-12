<?php
/* @var $this TblIsoPobController */
/* @var $model TblIsoPob */

$this->breadcrumbs=array(
	'Tbl Iso Pobs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblIsoPob', 'url'=>array('index')),
	array('label'=>'Manage TblIsoPob', 'url'=>array('admin')),
);
?>

<h1>Create TblIsoPob</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>