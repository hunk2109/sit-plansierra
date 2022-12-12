<?php
/* @var $this TblHiperAlcampoController */
/* @var $model TblHiperAlcampo */

$this->breadcrumbs=array(
	'Tbl Hiper Alcampos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TblHiperAlcampo', 'url'=>array('index')),
	array('label'=>'Create TblHiperAlcampo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tbl-hiper-alcampo-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Tabla Hiper Alcampo</h1>

<p>
Incluye hipermercados Alcampo dados de alta en la herramienta. (Deben tener Cod Nielssen)
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tbl-hiper-alcampo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_hiper_alcampo',
		'cod_nielssen',
		'nombre',
		'region',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
