<?php
/* @var $this JurisdictionProfessionController */
/* @var $model JurisdictionProfession */
?>

<?php
$this->breadcrumbs=array(
	'Jurisdiction Professions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List JurisdictionProfession', 'url'=>array('index')),
	array('label'=>'Create JurisdictionProfession', 'url'=>array('create')),
	array('label'=>'View JurisdictionProfession', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage JurisdictionProfession', 'url'=>array('admin')),
);
?>

    <h1>Update JurisdictionProfession <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>