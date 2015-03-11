<?php
/* @var $this JurisdictionServiceController */
/* @var $model JurisdictionService */

$this->pageTitle = 'Services - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Services' => array('admin'),
    'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#jurisdiction-service-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="widget-box">
    <div class="widget-header">
        <h5>Manage Services</h5>
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
                'id' => 'jurisdiction-service-grid',
                'dataProvider' => $model->search(),
                'filter' => $model,
                'columns' => array(
                    array(
                        'name' => 'district_id',
                        'type' => 'raw',
                        'value' => '$data->district->taxes_area',
                        'filter' => CHtml::activeDropDownList($model, 'district_id', CHtml::listData(JurisdictionDistrict::model()->findAll(array('condition' => '', "order" => "taxes_area")), 'id', 'taxes_area'), array('empty' => 'All')),
                        'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Tax Area'),
                    ),
                    array(
                        'name' => 'employer_id',
                        'type' => 'raw',
                        'value' => '$data->employer->tax_employer',
                        'filter' => CHtml::activeDropDownList($model, 'employer_id', CHtml::listData(JurisdictionEmployer::model()->findAll(array('condition' => '', "order" => "tax_employer")), 'id', 'tax_employer'), array('empty' => 'All')),
                        'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Employer'),
                    ),
                    array(
                        'name' => 'character_id',
                        'type' => 'raw',
                        'value' => 'JurisdictionCharacter::get_title($data->character_id)',
                        'filter' => CHtml::activeDropDownList($model, 'character_id', CHtml::listData(JurisdictionCharacter::model()->findAll(array('condition' => '', "order" => "character_name")), 'id', 'character_name'), array('empty' => 'All')),
                        'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Character'),
                    ),
                    'assessee',
                    array(
                        'name' => 'zone',
                        'type' => 'raw',
                        'value' => '$data->zone0->tax_taxes_zone',
                        'filter' => CHtml::activeDropDownList($model, 'zone', CHtml::listData(JurisdictionZone::model()->findAll(array('condition' => '', "order" => "tax_taxes_zone")), 'id', 'tax_taxes_zone'), array('empty' => 'All')),
                        'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Zone'),
                    ),
                    array(
                        'name' => 'circle',
                        'type' => 'raw',
                        'value' => '$data->circle0->tax_taxes_circle',
                        'filter' => CHtml::activeDropDownList($model, 'circle', CHtml::listData(JurisdictionCircle::model()->findAll(array('condition' => '', "order" => "tax_taxes_circle")), 'id', 'tax_taxes_circle'), array('empty' => 'All')),
                        'htmlOptions' => array('style' => "text-align:left;", 'title' => 'Circle'),
                    ),
                    array(
                        'class' => 'bootstrap.widgets.TbButtonColumn',
                    ),
                ),
            ));
            ?>
        </div>
    </div><!--/.widget-body -->
</div><!--/.widget-box -->