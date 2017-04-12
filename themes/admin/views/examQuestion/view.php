<?php
/* @var $this ExamQuestionController */
/* @var $model ExamQuestion */
?>

<?php
$this->pageTitle = 'Exam Question Details - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Exam Questions' => array('admin'),
    $model->question,
);
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>Details Exam Question (<?php echo $model->question; ?>)</h5>
        <div class="widget-toolbar">
            <a data-action="settings" href="#"><i class="icon-cog"></i></a>
            <a data-action="reload" href="#"><i class="icon-refresh"></i></a>
            <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="icon-remove"></i></a>
        </div>
        <div class="widget-toolbar">
            <?php echo CHtml::link('<i class="icon-pencil"></i>', array('update', 'id' => $model->id), array('data-rel' => 'tooltip', 'title' => 'Edit', 'data-placement' => 'bottom')); ?>
        </div>
        <div class="widget-toolbar">
            <?php echo CHtml::link('<i class="icon-plus"></i>', array('create'), array('data-rel' => 'tooltip', 'title' => 'Add', 'data-placement' => 'bottom')); ?>
        </div>
    </div><!--/.widget-header -->
    <div class="widget-body">
        <div class="widget-main">
            <h4><?php echo $model->question; ?></h4>
            <?php
            $this->widget('bootstrap.widgets.TbGridView', array(
                'id' => 'exam-answer-grid',
                'dataProvider' => $modelAnswer->search($model->id),
                'filter' => $modelAnswer,
                'columns' => array(
                    array(
                        'name' => 'answer',
                        'type' => 'raw',
                        'value' => '$data->answer',
                        'htmlOptions' => array('style' => "text-align:left;"),
                    ),
                    array(
                        'name' => 'correct',
                        'value' => '$data->correct?Yii::t(\'app\',\'Yes\'):Yii::t(\'app\', \'No\')',
                        'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
                        'htmlOptions' => array('style' => "text-align:center;"),
                    ),
                    array(
                        'name' => 'published',
                        'value' => '$data->published?Yii::t(\'app\',\'Active\'):Yii::t(\'app\', \'Inactive\')',
                        'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'Inactive'), '1' => Yii::t('app', 'Active')),
                        'htmlOptions' => array('style' => "text-align:center;"),
                    ),
                    array(
                        'header' => 'Actions',
                        'class' => 'bootstrap.widgets.TbButtonColumn',
                        'template' => '{delete}',
                        'buttons' => array(
                            'delete' => array(
                                'label' => '',
                                'imageUrl' => '',
                                'url' => 'yii::app()->createUrl("examQuestion/remove", array("id"=>$data["id"]))',
                            ),
                        ),
                    ),
                ),
            ));
            ?>  
            <?php
            $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                'id' => 'exam-answer-form',
                'enableAjaxValidation' => false,
                'htmlOptions' => array(
                    'enctype' => 'multipart/form-data',
                    'onsubmit' => "return false;", /* Disable normal form submit */
                ),
            ));
            ?>
            <p class="help-block">Fields with <span class="required">*</span> are required.</p>
            <?php echo $form->errorSummary($modelForm); ?>
            <?php echo $form->hiddenField($modelForm, 'question', array('value' => $model->id)); ?>
            <div class="row-fluid">
                <div class="span6">
                    <?php echo $form->textFieldControlGroup($modelForm, 'answer', array('span' => 12, 'maxlength' => 400)); ?>
                </div>
                <div class="span2">
                    <?php echo $form->dropDownListControlGroup($modelForm, 'correct', array('1' => 'Yes', '0' => 'No')); ?>
                </div>
                <div class="span2">
                    <?php echo $form->dropDownListControlGroup($modelForm, 'published', array('1' => 'Yes', '0' => 'No')); ?>
                </div>
                <div class="span2" style="margin-top: 20px;">
                    <?php
                    echo TbHtml::submitButton($modelForm->isNewRecord ? 'Add Answer' : 'Save', array(
                        'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                        'size' => TbHtml::BUTTON_SIZE_SMALL,
                        'onclick' => 'newOrder();',
                    ));
                    ?>
                </div>
            </div>                                 
            <?php $this->endWidget(); ?>
        </div>
    </div><!--/.widget-body -->
</div><!--/.widget-box -->
<script type="text/javascript">
    function newOrder() {
        var formData = new FormData($('#exam-answer-form')[0]);
        $.ajax({
            type: 'POST',
            url: '<?php echo Yii::app()->createAbsoluteUrl("examQuestion/add"); ?>',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                //alert("succes:" + data);
                if (data != "false")
                {
                    $('#exam-answer-grid').yiiGridView('update');
                    $('#exam-answer-form').each(function () {
                        this.reset();
                    });
                }
            },
            error: function (data) { // if error occured
                alert("Error occured. Please try again");
                $('#exam-answer-form').each(function () {
                    this.reset();
                });
                //alert(data);
            },
            dataType: 'html'
        });
    }
</script>