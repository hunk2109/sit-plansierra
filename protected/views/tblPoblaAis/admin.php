<?php
/* @var $this TblPoblaAisController */
/* @var $model TblPoblaAis */

$this->breadcrumbs=array(
	'Tbl Pobla Aises'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List TblPoblaAis', 'url'=>array('index')),
	array('label'=>'Create TblPoblaAis', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('tbl-pobla-ais-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tbl Pobla Aises</h1>

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
	'id'=>'tbl-pobla-ais-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'seccion',
		'habitantes',
		'familias',
		'a',
		'b',
		'c',
		/*
		'd',
		'e',
		'f',
		'g',
		'h',
		'i',
		'j',
		'k',
		'l',
		'm',
		'n',
		'o',
		'p',
		'q',
		'r',
		'a_por',
		'b_por',
		'c_por',
		'd_por',
		'e_por',
		'f_por',
		'g_por',
		'h_por',
		'i_por',
		'j_por',
		'k_por',
		'l_por',
		'm_por',
		'n_por',
		'o_por',
		'p_por',
		'q_por',
		'r_por',
		'id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
