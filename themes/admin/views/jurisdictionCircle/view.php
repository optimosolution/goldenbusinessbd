<?php
/* @var $this JurisdictionCircleController */
/* @var $model JurisdictionCircle */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Circles'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List JurisdictionCircle', 'url'=>array('index')),
	array('label'=>'Create JurisdictionCircle', 'url'=>array('create')),
	array('label'=>'Update JurisdictionCircle', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete JurisdictionCircle', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage JurisdictionCircle', 'url'=>array('admin')),
);
?>

<h1>View JurisdictionCircle #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'zone_id',
		'tax_taxes_circle',
		'address',
	),
)); ?>