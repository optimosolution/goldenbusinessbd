<?php
/* @var $this ExamController */
/* @var $model Exam */

$this->breadcrumbs = array(
    'Result',
);
?>
<h1>Result: <?php echo ExamCategory::getData($_REQUEST['id'], 'title'); ?></h1>
<h4>Total Answer: <?php echo Exam::getTotalAnswer($_REQUEST['id']); ?></h4>
<h4>Correct: <?php echo Exam::getTotalCorrect($_REQUEST['id']); ?></h4>
<h4>Incorrect: <?php echo Exam::getTotalIncorrect($_REQUEST['id']); ?></h4>
<?php
$array = Exam::model()->findAll(array('condition' => 'category=' . (int) $_REQUEST["id"]));
echo '<ol style="font-size: 16px;">';
foreach ($array as $key => $value) {
    echo '<li style="margin-top:20px;">' . ExamQuestion::getData($value['question'], 'question') . '</li>';
    echo '<b>Your Answer:</b> ' . ExamAnswer::getData($value['answer'], 'answer') . '<br />';
    echo '<span class="text-primary"><b>Correct:</b> ' . ExamAnswer::getData($value['correct'], 'answer') . '</span>';
}
echo '</ol>'
?>
<?php echo CHtml::link('<< COURSE LIST', array('course'), array('class' => 'btn btn-danger')); ?>