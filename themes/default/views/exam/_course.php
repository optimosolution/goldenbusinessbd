<?php
/* @var $this ExamController */
/* @var $data Exam */
?>
<div class="view">
    <h3><?php echo CHtml::link(CHtml::encode($data->title), array('exam', 'id' => $data->id)); ?></h3>
</div>