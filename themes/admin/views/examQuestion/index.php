<?php
/* @var $this ExamQuestionController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Exam Questions',
);

$this->menu=array(
	array('label'=>'Create ExamQuestion','url'=>array('create')),
	array('label'=>'Manage ExamQuestion','url'=>array('admin')),
);
?>

<h1>Exam Questions</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>