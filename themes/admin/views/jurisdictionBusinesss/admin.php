<?php
/* @var $this JurisdictionBusinesssController */
/* @var $model JurisdictionBusinesss */


$this->breadcrumbs=array(
	'Jurisdiction Businessses'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List JurisdictionBusinesss', 'url'=>array('index')),
	array('label'=>'Create JurisdictionBusinesss', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#jurisdiction-businesss-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Jurisdiction Businessses</h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>
        &lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'jurisdiction-businesss-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'district_id',
		'business_id',
		'location_id',
		'character_id',
		'assessee',
		/*
		'zone',
		'circle',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>