<?php
/* @var $this GeoSeccionesController */
/* @var $model GeoSecciones */

$this->breadcrumbs=array(
	'Geo Secciones'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List GeoSecciones', 'url'=>array('index')),
	array('label'=>'Create GeoSecciones', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('geo-secciones-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Geo Secciones</h1>

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
	'id'=>'geo-secciones-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'geom',
		'cod_secc',
		'cod_mun',
		'pob_0005',
		'pob_0514',
		'pob_1519',
		/*
		'pob_2029',
		'pob_2965',
		'pob_6599',
		'pobex_afric',
		'pobex_ameri',
		'pobex_asiat',
		'pobex_europ',
		'pobex_resto',
		'id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
