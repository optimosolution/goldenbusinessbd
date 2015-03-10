<?php
$this->pageTitle = 'New article - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Contents' => array('index'),
    'Manage',
);
?>
<h1>Articles Uploaded By Me</h1>
<div class="row">
    <div class="col-md-12">
        <?php
        $this->widget('bootstrap.widgets.TbGridView', array(
            'itemsCssClass' => 'table table-striped table-hover',
            'template' => '{items}{summary}{pager}',
            'pager' => array(
                'htmlOptions' => array(
                    'class' => 'pagination',
                ),
                'header' => '',
                'selectedPageCssClass' => 'active',
            ),
            'pagerCssClass' => 'dt-row dt-bottom-row',
            'id' => 'content-grid',
            'dataProvider' => $model->search_user(Yii::app()->user->id),
            'filter' => $model,
            'columns' => array(
                array(
                    'name' => 'title',
                    'type' => 'raw',
                    'value' => '$data->title',
                    'value' => 'CHtml::link($data->title, array("view","id"=>$data->id))',
                    'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Title'),
                ),
                array(
                    'name' => 'catid',
                    'type' => 'raw',
                    'value' => 'ContentCategory::getCategoryName($data->catid)',
                    'filter' => ContentCategory::get_category_new('Content', 'catid'),
                    'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Parent Category'),
                ),
                array(
                    'name' => 'state',
                    'value' => '$data->state?Yii::t(\'app\',\'Yes\'):Yii::t(\'app\', \'No\')',
                    'filter' => array('' => Yii::t('app', 'All'), '0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
                    'htmlOptions' => array('style' => "text-align:center;"),
                ),
                array(
                    'name' => 'hits',
                    'type' => 'raw',
                    'value' => '$data->hits',
                    'htmlOptions' => array('style' => "text-align:center; width:50px;", 'title' => 'Hits'),
                ),
            ),
        ));
        ?>
    </div> <!-- col-md-8 --> 
</div>
