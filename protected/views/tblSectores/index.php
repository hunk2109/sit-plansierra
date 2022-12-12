<?php
/* @var $this TblSectoresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tbl Sectores',
);

$this->menu=array(
	array('label'=>'Create TblSectores', 'url'=>array('create')),
	array('label'=>'Manage TblSectores', 'url'=>array('admin')),
);
?>

<h1>Tbl Sectores</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
