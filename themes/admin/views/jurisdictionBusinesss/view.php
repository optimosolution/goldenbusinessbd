<?php
/* @var $this JurisdictionBusinesssController */
/* @var $model JurisdictionBusinesss */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Businessses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List JurisdictionBusinesss', 'url'=>array('index')),
	array('label'=>'Create JurisdictionBusinesss', 'url'=>array('create')),
	array('label'=>'Update JurisdictionBusinesss', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete JurisdictionBusinesss', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage JurisdictionBusinesss', 'url'=>array('admin')),
);
?>

<h1>View JurisdictionBusinesss #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'district_id',
		'business_id',
		'location_id',
		'character_id',
		'assessee',
		'zone',
		'circle',
	),
)); ?>