<?php
/* @var $this GeoZonaInfluenciaController */
/* @var $model GeoZonaInfluencia */

$this->breadcrumbs=array(
	'Geo Zona Influencias'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List GeoZonaInfluencia', 'url'=>array('index')),
	array('label'=>'Create GeoZonaInfluencia', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('geo-zona-influencia-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Geo Zona Influencias</h1>

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
	'id'=>'geo-zona-influencia-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'gid',
		'loc',
		'geom',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
