<?php
/* @var $this TblZcConsolidadoController */
/* @var $model TblZcConsolidado */

$this->breadcrumbs=array(
	'Tbl Zc Consolidados'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TblZcConsolidado', 'url'=>array('index')),
	array('label'=>'Create TblZcConsolidado', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tbl-zc-consolidado-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tbl Zc Consolidados</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tbl-zc-consolidado-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'cod_zipcode',
		'cp',
		'venta_si',
		'venta_no',
		'venta_ns',
		/*
		'folleto_si',
		'folleto_no',
		'folleto_ns',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
