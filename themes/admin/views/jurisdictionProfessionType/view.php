<?php
/* @var $this JurisdictionProfessionTypeController */
/* @var $model JurisdictionProfessionType */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Profession Types'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List JurisdictionProfessionType', 'url'=>array('index')),
	array('label'=>'Create JurisdictionProfessionType', 'url'=>array('create')),
	array('label'=>'Update JurisdictionProfessionType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete JurisdictionProfessionType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage JurisdictionProfessionType', 'url'=>array('admin')),
);
?>

<h1>View JurisdictionProfessionType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'profession_type',
	),
)); ?>