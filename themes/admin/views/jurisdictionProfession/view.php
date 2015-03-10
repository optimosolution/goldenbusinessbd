<?php
/* @var $this JurisdictionProfessionController */
/* @var $model JurisdictionProfession */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Professions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List JurisdictionProfession', 'url'=>array('index')),
	array('label'=>'Create JurisdictionProfession', 'url'=>array('create')),
	array('label'=>'Update JurisdictionProfession', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete JurisdictionProfession', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage JurisdictionProfession', 'url'=>array('admin')),
);
?>

<h1>View JurisdictionProfession #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'district_id',
		'profession_id',
		'character_id',
		'assessee',
		'circle',
		'zone',
	),
)); ?>