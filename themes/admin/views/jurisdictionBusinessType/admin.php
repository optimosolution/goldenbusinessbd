<?php
/* @var $this JurisdictionBusinessTypeController */
/* @var $model JurisdictionBusinessType */


$this->breadcrumbs=array(
	'Jurisdiction Business Types'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List JurisdictionBusinessType', 'url'=>array('index')),
	array('label'=>'Create JurisdictionBusinessType', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#jurisdiction-business-type-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Jurisdiction Business Types</h1>

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
	'id'=>'jurisdiction-business-type-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'business',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>