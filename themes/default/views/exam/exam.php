<?php
/* @var $this ExamController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Exams',
);
?>

<h1>Exams: <?php echo ExamCategory::getData($_REQUEST['id'], 'title'); ?></h1>

<?php
$question = ExamQuestion::model()->findAll(array('condition' => 'category=' . (int) $_REQUEST["id"] . ' AND published=1', 'order' => 'RAND()'));
echo '<ol style="font-size: 16px;">';
foreach ($question as $key => $value) {
    echo '<li style="margin-top:20px;">' . $value['question'] . '</li>';
    $answer = ExamAnswer::model()->findAll(array('condition' => 'question=' . (int) $value['id'] . ' AND published=1', 'order' => 'RAND()'));
    foreach ($answer as $key => $valuea) {
        echo '<input type="radio" name="' . $value['id'] . '" value="' . $valuea['id'] . '" onclick="addExam(' . $_REQUEST['id'] . ',' . $value['id'] . ',' . $valuea['id'] . ')"> ' . $valuea['answer'] . '<br />';
    }
}
echo '</ol>'
?>
<?php echo CHtml::link('SUBMIT', array('result', 'id' => $_REQUEST['id']), array('class' => 'btn btn-primary')); ?>
<script type="text/javascript">
    function addExam(category, question, answer)
    {
        $.ajax({
            type: 'GET',
            url: '<?php echo Yii::app()->createAbsoluteUrl("exam/add"); ?>',
            data: {category: category, question: question, answer: answer},
            success: function (data) {
                //console.log(data);
                if (data != "false")
                {
                    //console.log(data);
                    //$('#loadpo-grid').yiiGridView('update');
                }
            },
            error: function (data) { // if error occured
                alert("Error occured. Please try again");
            },
            dataType: 'html'
        });
    }
</script>