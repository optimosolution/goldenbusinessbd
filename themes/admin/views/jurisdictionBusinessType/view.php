<?php
/* @var $this JurisdictionBusinessTypeController */
/* @var $model JurisdictionBusinessType */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Business Types'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List JurisdictionBusinessType', 'url'=>array('index')),
	array('label'=>'Create JurisdictionBusinessType', 'url'=>array('create')),
	array('label'=>'Update JurisdictionBusinessType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete JurisdictionBusinessType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage JurisdictionBusinessType', 'url'=>array('admin')),
);
?>

<h1>View JurisdictionBusinessType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'business',
	),
)); ?>