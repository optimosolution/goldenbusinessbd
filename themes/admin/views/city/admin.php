<?php
$this->pageTitle = 'Cities - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Cities' => array('admin'),
    'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('city-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>Manage Cities</h5>
        <div class="widget-toolbar">
            <a data-action="settings" href="#"><i class="icon-cog"></i></a>
            <a data-action="reload" href="#"><i class="icon-refresh"></i></a>
            <a data-action="collapse" href="#"><i class="icon-chevron-up"></i></a>
            <a data-action="close" href="#"><i class="icon-remove"></i></a>
        </div>
        <div class="widget-toolbar">
            <?php echo CHtml::link('<i class="icon-plus"></i>', array('create'), array('data-rel' => 'tooltip', 'title' => 'Add', 'data-placement' => 'bottom')); ?>
        </div>
        <div class="widget-toolbar">
            <?php echo CHtml::link('<i class="icon-search"></i>', '#', array('class' => 'search-button', 'data-rel' => 'tooltip', 'title' => 'Search', 'data-placement' => 'bottom')); ?>
        </div>
    </div><!--/.widget-header -->
    <div class="widget-body">
        <div class="widget-main">
            <div class="search-form" style="display:none">
                <?php
                $this->renderPartial('_search', array(
                    'model' => $model,
                ));
                ?>
            </div><!-- search-form -->
            <?php
            $this->widget('bootstrap.widgets.TbGridView', array(
                'type' => TbHtml::GRID_TYPE_HOVER,
                'id' => 'city-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    array(
                        'name' => 'country_id',
                        'type' => 'raw',
                        'value' => 'getCountryName($data->country_id)',
                        'filter' => CHtml::activeDropDownList($model, 'country_id', CHtml::listData(Country::model()->findAll(array('condition' => '', "order" => "country_name")), 'id', 'country_name'), array('empty' => 'All')),
                        'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Parent Category'),
                    ),
                    array(
                        'name' => 'state_id',
                        'type' => 'raw',
                        'value' => 'getStateName($data->state_id)',
                        'filter' => CHtml::activeDropDownList($model, 'state_id', CHtml::listData(State::model()->findAll(array('condition' => '', "order" => "state_name")), 'id', 'state_name'), array('empty' => 'All')),
                        'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Parent Category'),
                    ),
                    'city_name',
                    'city_3_code',
                    'city_2_code',
                    array(
                        'name' => 'ordering',
                        'type' => 'raw',
                        'value' => '$data->ordering',
                        'htmlOptions' => array('style' => "text-align:center; width:50px;", 'title' => 'Ordering'),
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
                    ),
                ),
            ));

            /**
             * Retrieves Country name by ID.
             * @return string.
             */
            function getCountryName($id) {
                $returnValue = Yii::app()->db->createCommand()
                        ->select('country_name')
                        ->from('{{country}}')
                        ->where('id=:id', array(':id' => $id))
                        ->queryScalar();

                return $returnValue;
            }

            /**
             * Retrieves State name by ID.
             * @return string.
             */
            function getStateName($id) {
                $returnValue = Yii::app()->db->createCommand()
                        ->select('state_name')
                        ->from('{{state}}')
                        ->where('id=:id', array(':id' => $id))
                        ->queryScalar();

                return $returnValue;
            }
            ?>
        </div>
    </div><!--/.widget-body -->
</div><!--/.widget-box -->