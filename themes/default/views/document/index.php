<?php
/* @var $this DocumentController */
/* @var $dataProvider CActiveDataProvider */
$this->pageTitle = DocumentCategory::getCategoryName($_REQUEST['id']) . ' - ' . Yii::app()->name;
$this->breadcrumbs = array(
    'Documents',
);
?>

<h1><?php echo DocumentCategory::getCategoryName($_REQUEST['id']); ?></h1>
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
                        <h3 class="post-title">Categories</h3>
                        <?php $this->get_document_category_list(); ?>
                    </div>
                </div> <!-- tab-content -->
            </div>
			<div class="block">
                <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FGoldenBangladesh&amp;width=360&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true&amp;appId=409526085754514" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:360px; height:290px;" allowTransparency="true"></iframe>
            </div>
        </aside> <!-- Sidebar -->
    </div> 
</div>
