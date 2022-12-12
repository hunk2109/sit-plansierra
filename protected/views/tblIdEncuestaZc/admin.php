<?php
/* @var $this TblIdEncuestaZcController */
/* @var $model TblIdEncuestaZc */

$this->breadcrumbs=array(
	'Tbl Id Encuesta Zcs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TblIdEncuestaZc', 'url'=>array('index')),
	array('label'=>'Create TblIdEncuestaZc', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tbl-id-encuesta-zc-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tbl Id Encuesta Zcs</h1>

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
	'id'=>'tbl-id-encuesta-zc-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_encuesta_zc',
		'fecha_ini',
		'fecha_fin',
		'id_hiper_alcampo',
		'tipo_zc',
		'cv',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
