<?php
/* @var $this JurisdictionDistrictController */
/* @var $model JurisdictionDistrict */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Districts'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List JurisdictionDistrict', 'url'=>array('index')),
	array('label'=>'Create JurisdictionDistrict', 'url'=>array('create')),
	array('label'=>'Update JurisdictionDistrict', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete JurisdictionDistrict', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage JurisdictionDistrict', 'url'=>array('admin')),
);
?>

<h1>View JurisdictionDistrict #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'taxes_area',
	),
)); ?>