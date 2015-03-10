<?php
/* @var $this JurisdictionCharacterController */
/* @var $model JurisdictionCharacter */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Characters'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List JurisdictionCharacter', 'url'=>array('index')),
	array('label'=>'Create JurisdictionCharacter', 'url'=>array('create')),
	array('label'=>'Update JurisdictionCharacter', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete JurisdictionCharacter', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage JurisdictionCharacter', 'url'=>array('admin')),
);
?>

<h1>View JurisdictionCharacter #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'character_name',
	),
)); ?>