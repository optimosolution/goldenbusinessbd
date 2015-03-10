<?php
/* @var $this JurisdictionLocationController */
/* @var $model JurisdictionLocation */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Locations'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List JurisdictionLocation', 'url'=>array('index')),
	array('label'=>'Create JurisdictionLocation', 'url'=>array('create')),
	array('label'=>'Update JurisdictionLocation', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete JurisdictionLocation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage JurisdictionLocation', 'url'=>array('admin')),
);
?>

<h1>View JurisdictionLocation #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'locations',
	),
)); ?>