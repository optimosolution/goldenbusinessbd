<?php
/* @var $this ContentController */
/* @var $dataProvider CActiveDataProvider */
$this->pageTitle = ContentCategory::getCategoryName($_REQUEST['id']) . ' - ' . Yii::app()->name;
$this->breadcrumbs = array(
    ContentCategory::getCategoryName($_REQUEST['id']),
);
?>
<h1><?php echo ContentCategory::getCategoryName($_REQUEST['id']); ?></h1>
<div class="row">
    <div class="col-md-8 col-md-push-4">
        <?php
        $this->widget('zii.widgets.CListView', array(
			'pager' => array(
                'htmlOptions' => array(
                    'class' => 'pagination',
                ),
                'header' => '',
                'selectedPageCssClass' => 'active',
            ),
            'pagerCssClass' => 'dt-row dt-bottom-row',
            'dataProvider' => $dataProvider,
            'itemView' => '_view',
        ));
        ?>
    </div> <!-- col-md-8 -->
    <div class="col-md-4 col-md-pull-8">
        <aside class="sidebar">
            <div class="block">
                <ul id="myTab2" class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#fav"><i class="fa fa-folder-open"></i></a></li>
                </ul>
                <div class="tab-content">
                    <div id="fav" class="tab-pane active">
                        <h3 class="post-title">Related Categories</h3>
                        <?php $this->get_content_subcategory_list_inner($_REQUEST['id']); ?>
                    </div>
                </div> <!-- tab-content -->
            </div>
            <?php
            $this->widget('application.extensions.fbLikeBox.fbLikeBox', array(
                'likebox' => array(
                    'url' => 'https://facebook.com/GoldenBangladesh',
                    'header' => 'true',
                    'width' => '360',
                    'height' => '500',
                    'layout' => 'light',
                    'show_post' => 'false',
                    'show_faces' => 'true',
                    'show_border' => 'true',
                )
            ));
            ?>
        </aside> <!-- Sidebar -->
    </div> 
</div>