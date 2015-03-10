<?php
/* @var $this JurisdictionServiceController */
/* @var $model JurisdictionService */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Services'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List JurisdictionService', 'url'=>array('index')),
	array('label'=>'Create JurisdictionService', 'url'=>array('create')),
	array('label'=>'Update JurisdictionService', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete JurisdictionService', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage JurisdictionService', 'url'=>array('admin')),
);
?>

<h1>View JurisdictionService #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'district_id',
		'employer_id',
		'character_id',
		'assessee',
		'zone',
		'circle',
	),
)); ?>