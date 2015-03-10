<?php
/* @var $this JurisdictionCompanyController */
/* @var $model JurisdictionCompany */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Companies'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List JurisdictionCompany', 'url'=>array('index')),
	array('label'=>'Create JurisdictionCompany', 'url'=>array('create')),
	array('label'=>'Update JurisdictionCompany', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete JurisdictionCompany', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage JurisdictionCompany', 'url'=>array('admin')),
);
?>

<h1>View JurisdictionCompany #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'district_id',
		'company_id',
		'character_id',
		'assessee',
		'zone',
		'circle',
	),
)); ?>