<?php
/* @var $this ExamController */
/* @var $model Exam */

$this->breadcrumbs=array(
	'Exams'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Exam', 'url'=>array('index')),
	array('label'=>'Create Exam', 'url'=>array('create')),
	array('label'=>'View Exam', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Exam', 'url'=>array('admin')),
);
?>

<h1>Update Exam <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>