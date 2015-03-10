<?php
/* @var $this JurisdictionEmployerController */
/* @var $model JurisdictionEmployer */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Employers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List JurisdictionEmployer', 'url'=>array('index')),
	array('label'=>'Create JurisdictionEmployer', 'url'=>array('create')),
	array('label'=>'Update JurisdictionEmployer', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete JurisdictionEmployer', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage JurisdictionEmployer', 'url'=>array('admin')),
);
?>

<h1>View JurisdictionEmployer #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'tax_employer',
		'tax_area',
		'character_id',
	),
)); ?>