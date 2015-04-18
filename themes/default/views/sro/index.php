<?php
/* @var $this SroController */
/* @var $dataProvider CActiveDataProvider */
$this->pageTitle = SroType::get_title($_GET['id']) . ' - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'SRO',
    SroType::get_title($_GET['id'])
);
?>
<h3><?php echo SroType::get_title($_GET['id']); ?></h3>
<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'sro-grid',
    'dataProvider' => $model->search_sro($_GET['id']),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'sl_no',
            'type' => 'raw',
            'value' => '$data->sl_no',
            'htmlOptions' => array('style' => "text-align:center;width:80px;", 'title' => 'SL'),
        ),
        array(
            'name' => 'sro_no',
            'type' => 'raw',
            'value' => 'CHtml::link($data->sro_no, array("view","id"=>$data->id))',
            'htmlOptions' => array('style' => "text-align:left;width:250px;", 'title' => 'SRO No.'),
        ),
        array(
            'name' => 'sro_date',
            'value' => 'UserAdmin::get_date($data->sro_date)',
            'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array('model' => $model, 'attribute' => 'sro_date', 'htmlOptions' => array('id' => 'datepicker1', 'size' => '10',), 'i18nScriptFile' => 'jquery.ui.datepicker-en.js', 'defaultOptions' => array('showOn' => 'focus', 'dateFormat' => 'yy-mm-dd', 'showOtherMonths' => true, 'selectOtherMonths' => true, 'changeMonth' => true, 'changeYear' => true, 'showButtonPanel' => false,)), true),
            'htmlOptions' => array('style' => "text-align:center;width:120px;"),
        ),
        array(
            'name' => 'description',
            'type' => 'raw',
            'value' => '$data->description',
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Description'),
        ),
        array(
            'name' => 'status',
            'type' => 'raw',
            'filter' => CHtml::activeDropDownList($model, 'status', CHtml::listData(SroStatus::model()->findAll(array("order" => "id")), 'id', 'title'), array('empty' => 'All')),
            'value' => 'SroStatus::getStatus($data->status)',
            'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Status'),
        ),
        array(
            'header' => 'Download',
            'type' => 'raw',
            'value' => 'CHtml::link("<i class=\'fa fa-download\'></i>", array("download","id"=>$data->id))',
            'htmlOptions' => array('style' => "text-align:center;width:50px;", 'title' => 'Download'),
        ),
    ),
));
?>
