<?php
/* @var $this JurisdictionZoneController */
/* @var $model JurisdictionZone */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Zones'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List JurisdictionZone', 'url'=>array('index')),
	array('label'=>'Create JurisdictionZone', 'url'=>array('create')),
	array('label'=>'Update JurisdictionZone', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete JurisdictionZone', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage JurisdictionZone', 'url'=>array('admin')),
);
?>

<h1>View JurisdictionZone #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'tax_taxes_zone',
	),
)); ?>