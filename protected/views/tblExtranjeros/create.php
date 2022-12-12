<?php
/* @var $this TblExtranjerosController */
/* @var $model TblExtranjeros */

$this->breadcrumbs=array(
	'Tbl Extranjeroses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblExtranjeros', 'url'=>array('index')),
	array('label'=>'Manage TblExtranjeros', 'url'=>array('admin')),
);
?>

<h1>Create TblExtranjeros</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>