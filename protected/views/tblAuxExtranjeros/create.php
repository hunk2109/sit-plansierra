<?php
/* @var $this TblAuxExtranjerosController */
/* @var $model TblAuxExtranjeros */

$this->breadcrumbs=array(
	'Tbl Aux Extranjeroses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TblAuxExtranjeros', 'url'=>array('index')),
	array('label'=>'Manage TblAuxExtranjeros', 'url'=>array('admin')),
);
?>

<h1>Create TblAuxExtranjeros</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>