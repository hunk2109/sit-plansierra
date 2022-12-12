<?php
/* @var $this TblZipcodeController */
/* @var $model TblZipcode */

$this->breadcrumbs=array(
	'Tbl Zipcodes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TblZipcode', 'url'=>array('index')),
	array('label'=>'Create TblZipcode', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tbl-zipcode-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tbl Zipcodes</h1>

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
	'id'=>'tbl-zipcode-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_consulta_por_cp',
		'id_encuesta_zc',
		'cp',
		'cv',
		'caddy',
		'pasos',
		/*
		'folleto',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
