<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {

    public $userData;

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = 'application.views.layouts.column1';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'users' => array('*'),
                'actions' => array('login'),
            ),
            array('allow',
                'users' => array('@'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function init() {
        $this->statistics();
    }

    public function checkAccess($controller, $action) {
        $val = Yii::app()->db->createCommand()
                ->select('access')
                ->from('{{acl}}')
                ->where('LOWER(controller)="' . $controller . '" AND LOWER(actions)="' . $action . '" AND group_id=' . Yii::app()->user->group . ' AND controller_type=0')
                ->queryScalar();
        if (empty($val)) {
            $val = 1;
        } else {
            $val = $val;
        }
        return $val;
    }

    public function statistics() {
        $model = new Visitor;
        $model->user_type = 0;
        $model->user_id = Yii::app()->user->id;
        $model->user_name = Yii::app()->user->name;
        $model->server_time = new CDbExpression('NOW()');
        $model->page_title = $this->pageTitle;
        $model->page_link = Yii::app()->request->url;
        $model->browser = Yii::app()->browser->getBrowser();
        $model->visitor_ip = $_SERVER['REMOTE_ADDR'];
        $model->save();
    }

    public function strip_html_tags($string) {

        $string = str_replace("\r", ' ', $string);
        $string = str_replace("\n", ' ', $string);
        $string = str_replace("\t", ' ', $string);
        $pattern = '/<[^>]*>/';
        $string = preg_replace($pattern, ' ', $string);
        $string = trim(preg_replace('/ {2,}/', ' ', $string));

        return $string;
    }

    public function get_latest_updates($catid) {
        $array = Yii::app()->db->createCommand()
                ->select('id,title,profile_picture,introtext')
                ->from('{{content}}')
                ->where('state=1 AND catid=' . $catid . ' OR catid IN(SELECT c.id FROM {{content_category}} c WHERE c.parent_id=' . $catid . ')')
                ->limit('5')
                ->order('created DESC, id DESC')
                ->queryAll();
        foreach ($array as $key => $values) {
            echo '<div class="media">';
            $filePath = Yii::app()->basePath . '/../uploads/profile_picture/' . $values['profile_picture'];
            if ((is_file($filePath)) && (file_exists($filePath))) {
                $image = CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $values['profile_picture'], 'Picture', array('alt' => $values['title'], 'class' => 'media-object', 'title' => $values['title'], 'style' => 'width:100px;'));
                echo CHtml::link($image, array('/content/view', 'id' => $values['id']), array('class' => 'pull-left'));
            } else {
                $image = CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/noimage.jpg', 'Picture', array('alt' => $values['title'], 'class' => 'media-object', 'title' => $values['title'], 'style' => 'width:75px;'));
                echo CHtml::link($image, array('/content/view', 'id' => $values['id']), array('class' => 'pull-left'));
            }
            echo '<div class = "media-body">';
            echo '<h4 class = "media-heading">' . CHtml::link($values['title'], array('/content/view', 'id' => $values['id'])) . '</h4>';
            echo mb_substr(CHtml::decode($this->strip_html_tags($values['introtext'])), 0, 100, 'UTF-8');
            echo '</div>';
            echo '</div>';
        }
        echo CHtml::link('Read more articles', array('/content/index', 'id' => $catid), array('class' => 'btn btn-default pull-right'));
        echo '<div class="clearfix"></div>';
    }

    public function get_latest_profile($catid) {
        $array = Yii::app()->db->createCommand()
                ->select('id,title,profile_picture,introtext,created')
                ->from('{{content}}')
                ->where('state=1 AND catid=' . $catid)
                ->limit('1')
                ->order('created DESC, id DESC')
                ->queryAll();
        foreach ($array as $key => $values) {
            $image = CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $values['profile_picture'], 'Picture', array('alt' => $values['title'], 'class' => 'img-post img-responsive', 'title' => $values['title'], 'style' => ''));
            echo '<article class="post animated fadeInLeft animation-delay-8">';
            echo '<div class="panel panel-default">';
            echo '<div class="panel-body">';
            echo '<h3 class="post-title">' . CHtml::link($values['title'], array('/content/view', 'id' => $values['id']), array('class' => 'transicion')) . '</h3>';
            echo '<div class="row">';
            echo '<div class="col-lg-4">';
            echo CHtml::link($image, array('/content/view', 'id' => $values['id']), array('class' => ''));
            echo '</div>';
            echo '<div class="col-lg-8">';
            echo mb_substr(CHtml::decode($this->strip_html_tags($values['introtext'])), 0, 400, 'UTF-8');
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '<div class="panel-footer">';
            echo '<div class="row">';
            echo '<div class="col-lg-10 col-md-9 col-sm-8">';
            //echo '<i class="fa fa-clock-o"></i> ' . UserAdmin::get_date($values['created']) . '.';
            echo '</div>';
            echo '<div class="col-lg-2 col-md-3 col-sm-4">';
            echo CHtml::link('Read more &raquo;', array('/content/view', 'id' => $values['id']), array('class' => 'pull-right'));
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</article>';
        }
    }

    public function get_latest_message($catid) {
        $array = Yii::app()->db->createCommand()
                ->select('id,title,profile_picture,introtext')
                ->from('{{content}}')
                ->where('state=1 AND catid=' . $catid)
                ->limit('1')
                ->order('created DESC, id DESC')
                ->queryAll();
        foreach ($array as $key => $values) {
            $image = CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $values['profile_picture'], 'Picture', array('alt' => $values['title'], 'class' => 'img-responsive alignleft imageborder', 'title' => $values['title'], 'style' => 'width:120px;'));
            echo '<h5>' . CHtml::link($values['title'], array('/content/view', 'id' => $values['id']), array('style' => 'color:#000;')) . '</h5>';
            echo CHtml::link($image, array('/content/view', 'id' => $values['id']), array('class' => ''));
            echo mb_substr(CHtml::decode($this->strip_html_tags($values['introtext'])), 0, 400, 'UTF-8');
        }
    }

    public function get_latest_business_blog($catid) {
        $array = Yii::app()->db->createCommand()
                ->select('id,title,profile_picture,created')
                ->from('{{content}}')
                ->where('state=1 AND catid=' . $catid . ' OR catid IN(SELECT c.id FROM {{content_category}} c WHERE c.parent_id=' . $catid . ')')
                ->limit('5')
                ->order('created DESC, id DESC')
                ->queryAll();
        foreach ($array as $key => $values) {
            echo '<div class="media">';
            $filePath = Yii::app()->basePath . '/../uploads/profile_picture/' . $values['profile_picture'];
            if ((is_file($filePath)) && (file_exists($filePath))) {
                $image = CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $values['profile_picture'], 'Picture', array('alt' => $values['title'], 'class' => 'media-object', 'title' => $values['title'], 'style' => 'width:100px;'));
                echo CHtml::link($image, array('/content/view', 'id' => $values['id']), array('class' => 'pull-left'));
            } else {
                $image = CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/noimage.jpg', 'Picture', array('alt' => $values['title'], 'class' => 'media-object', 'title' => $values['title'], 'style' => 'width:75px;'));
                echo CHtml::link($image, array('/content/view', 'id' => $values['id']), array('class' => 'pull-left'));
            }
            echo '<div class = "media-body">';
            echo '<h4 class = "media-heading">' . CHtml::link($values['title'], array('/content/view', 'id' => $values['id'])) . '</h4>';
            //echo '<small>' . UserAdmin::get_date($values['created']) . '</small>';
            echo '</div>';
            echo '</div>';
        }
        echo CHtml::link('More ' . ContentCategory::getCategoryName($catid), array('/content/index', 'id' => $catid), array('class' => 'btn btn-primary btn-xs pull-right', 'style' => 'margin-top:10px;'));
        echo '<div class="clearfix"></div>';
    }

    public function get_popular_business_blog($catid) {
        $array = Yii::app()->db->createCommand()
                ->select('id,title,profile_picture,created')
                ->from('{{content}}')
                ->where('state=1 AND catid=' . $catid . ' OR catid IN(SELECT c.id FROM {{content_category}} c WHERE c.parent_id=' . $catid . ')')
                ->limit('3')
                ->order('hits DESC, id DESC')
                ->queryAll();
        foreach ($array as $key => $values) {
            echo '<div class="media">';
            $filePath = Yii::app()->basePath . '/../uploads/profile_picture/' . $values['profile_picture'];
            if ((is_file($filePath)) && (file_exists($filePath))) {
                $image = CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $values['profile_picture'], 'Picture', array('alt' => $values['title'], 'class' => 'media-object', 'title' => $values['title'], 'style' => 'width:100px;'));
                echo CHtml::link($image, array('/content/view', 'id' => $values['id']), array('class' => 'pull-left'));
            } else {
                $image = CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/noimage.jpg', 'Picture', array('alt' => $values['title'], 'class' => 'media-object', 'title' => $values['title'], 'style' => 'width:75px;'));
                echo CHtml::link($image, array('/content/view', 'id' => $values['id']), array('class' => 'pull-left'));
            }
            echo '<div class = "media-body">';
            echo '<h4 class = "media-heading">' . CHtml::link($values['title'], array('/content/view', 'id' => $values['id'])) . '</h4>';
            //echo '<small>' . UserAdmin::get_date($values['created']) . '</small>';
            echo '</div>';
            echo '</div>';
        }
        echo '<div class="clearfix"></div>';
    }

    public function get_latest_gbb_news($catid) {
        $array = Yii::app()->db->createCommand()
                ->select('id,title,profile_picture,introtext,created')
                ->from('{{content}}')
                ->where('state=1 AND catid=' . $catid)
                ->limit('2')
                ->order('created DESC, id DESC')
                ->queryAll();
        foreach ($array as $key => $values) {
            $filePath = Yii::app()->basePath . '/../uploads/profile_picture/' . $values['profile_picture'];
            if ((is_file($filePath)) && (file_exists($filePath))) {
                $image = CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $values['profile_picture'], 'Picture', array('alt' => $values['title'], 'class' => 'img-responsive', 'title' => $values['title'], 'style' => ''));
                echo CHtml::link($image, array('/content/view', 'id' => $values['id']), array('class' => 'thumbnail'));
            }
            echo '<h2 class="home-post-title">' . CHtml::link($values['title'], array('/content/view', 'id' => $values['id']), array('style' => 'color:#000;')) . '</h2>';
            echo mb_substr(CHtml::decode($this->strip_html_tags($values['introtext'])), 0, 500, 'UTF-8');
            echo '<div class="row home-post-footer">';
            echo '<div class="col-md-8">';
            echo '<div class="home-post-meta">';
            echo '<i class="fa fa-clock-o"></i> ' . UserAdmin::get_date($values['created']);
            echo '</div>';
            echo '</div>';
            echo '<div class="col-md-4">';
            echo CHtml::link('Read more', array('/content/view', 'id' => $values['id']), array('class' => 'btn btn-primary btn-block'));
            echo '</div>';
            echo '</div>';
        }
    }

    public function get_directory_category() {
        $array = Yii::app()->db->createCommand()
                ->select('id,title,details')
                ->from('{{directory_category}}')
                ->where('published=1')
                ->limit('10')
                //->order('created_on DESC, id DESC')
                ->order('rand()')
                ->queryAll();
        echo '<div class="pricign-box pricign-box-pro animated fadeInUp animation-delay-9">';
        echo '<div class="pricing-box-header">';
        echo '<h2>Business Directory</h2>';
        echo '</div>';
        echo '<div class="pricing-box-content">';
        echo '<ul>';
        foreach ($array as $key => $values) {
            echo '<li><i class="fa fa-external-link-square"></i> ' . CHtml::link($values['title'], array('/edirectory/index', 'id' => $values['id'])) . '</li>';
        }
        echo '</ul>';
        echo '</div>';
        echo '<div class="pricing-box-footer">';
        echo CHtml::link('More caregories', array('/edirectory/index'), array('class' => 'btn btn-primary btn-xs', 'style' => ''));
        echo '</div>';
        echo '</div>';
    }

    public function get_latest_directory() {
        $array = Yii::app()->db->createCommand()
                ->select('id,title,created_on')
                ->from('{{directory}}')
                ->where('published=1')
                ->limit('7')
                //->order('created_on DESC, id DESC')
                ->order('rand()')
                ->queryAll();
        foreach ($array as $key => $values) {
            echo '<div class="media">';
            echo '<div class = "media-body">';
            echo '<div><i class="fa fa-external-link-square"></i> ' . CHtml::link($values['title'], array('/edirectory/view', 'id' => $values['id'])) . '</div>';
            echo '</div>';
            echo '</div>';
        }
        echo '<div class="clearfix"></div>';
    }

    public function get_weblink_category() {
        $array = Yii::app()->db->createCommand()
                ->select('id,title,created_time')
                ->from('{{weblink_category}}')
                ->where('published=1')
                ->order('title ASC')
                ->queryAll();
        echo '<ul class="media-list">';
        foreach ($array as $key => $values) {
            echo '<li class="media">';
            echo '<div class = "media-body">';
            echo '<div><i class="fa fa-external-link-square"></i> ' . CHtml::link($values['title'], array('/weblink/index', 'id' => $values['id'])) . '</div>';
            echo '</div>';
            echo '</li>';
        }
        echo '</ul>';
    }

    public function get_directory_category_list() {
        $array = Yii::app()->db->createCommand()
                ->select('id,title,created_on')
                ->from('{{directory_category}}')
                ->where('published=1 AND parent=0')
                ->order('title ASC')
                ->queryAll();
        echo '<ul class="media-list">';
        foreach ($array as $key => $values) {
            echo '<li class="media">';
            echo '<div class = "media-body">';
            echo '<div><i class="fa fa-external-link-square"></i> ' . CHtml::link($values['title'], array('/edirectory/category', 'id' => $values['id'])) . '</div>';
            echo '</div>';
            echo '</li>';
        }
        echo '</ul>';
    }

    public function get_directory_subcategory_list($id) {
        $array = Yii::app()->db->createCommand()
                ->select('id,title,created_on')
                ->from('{{directory_category}}')
                ->where('published=1 AND parent=' . $id)
                ->order('title ASC')
                ->queryAll();
        echo '<ul class="media-list">';
        foreach ($array as $key => $values) {
            echo '<li class="media">';
            echo '<div class = "media-body">';
            echo '<div><i class="fa fa-external-link-square"></i> ' . CHtml::link($values['title'], array('/edirectory/category', 'id' => $values['id'])) . '</div>';
            echo '</div>';
            echo '</li>';
        }
        echo '</ul>';
    }

    public function get_content_subcategory_list_inner($id) {
        $array = Yii::app()->db->createCommand()
                ->select('id,title,created_time')
                ->from('{{content_category}}')
                ->where('published=1 AND parent_id=' . $id)
                ->order('ordering ASC')
                ->queryAll();
        echo '<div class="pricing-box-content">';
        echo '<ul>';
        foreach ($array as $key => $values) {
            echo '<li><i class="fa fa-inbox"></i> ' . CHtml::link($values['title'], array('/content/index', 'id' => $values['id'])) . '</li>';
        }
        echo '</ul>';
        echo '</ul>';
    }

    public function get_content_subcategory_list($id) {
        $array = Yii::app()->db->createCommand()
                ->select('id,title,created_time')
                ->from('{{content_category}}')
                ->where('published=1 AND parent_id=' . $id)
                ->order('ordering ASC')
                //->order('rand()')
                //->limit(10)
                ->queryAll();
        echo '<div class="pricign-box pricign-box-pro animated fadeInUp animation-delay-9">';
        echo '<div class="pricing-box-header">';
        echo '<h2>' . ContentCategory::getCategoryName($id) . '</h2>';
        echo '</div>';
        echo '<div class="pricing-box-content">';
        echo '<ul>';
        foreach ($array as $key => $values) {
            echo '<li><i class="fa fa-inbox"></i> ' . CHtml::link($values['title'], array('/content/index', 'id' => $values['id'])) . '</li>';
        }
        echo '</ul>';
        echo '</div>';
        echo '</div>';
    }

    public function get_content_subcategory_list_it($id) {
        $array = Yii::app()->db->createCommand()
                ->select('id,title,created_time')
                ->from('{{content_category}}')
                ->where('published=1 AND parent_id=' . $id)
                ->order('ordering ASC')
                //->order('rand()')
                //->limit(10)
                ->queryAll();
        echo '<div class="pricign-box pricign-box-pro animated fadeInUp animation-delay-9">';
        echo '<div class="pricing-box-header">';
        echo '<h2>' . ContentCategory::getCategoryName($id) . '</h2>';
        echo '</div>';
        echo '<div class="pricing-box-content">';
        echo '<ul>';
        foreach ($array as $key => $values) {
            echo '<li><i class="fa fa-inbox"></i> ' . CHtml::link($values['title'], array('/content/index', 'id' => $values['id'])) . '</li>';
        }
        echo '<li><i class="fa fa-inbox"></i> ' . CHtml::link('SRO', array('sro/index', 'id' => 1)) . '</li>';
        echo '<li><i class="fa fa-inbox"></i> ' . CHtml::link('Forms', array('document/index', 'id' => 73)) . '</li>';
        echo '</ul>';
        echo '</div>';
        echo '</div>';
    }

    public function get_content_subcategory_list_vat($id) {
        $array = Yii::app()->db->createCommand()
                ->select('id,title,created_time')
                ->from('{{content_category}}')
                ->where('published=1 AND parent_id=' . $id)
                ->order('ordering ASC')
                //->order('rand()')
                //->limit(10)
                ->queryAll();
        echo '<div class="pricign-box pricign-box-pro animated fadeInUp animation-delay-9">';
        echo '<div class="pricing-box-header">';
        echo '<h2>' . ContentCategory::getCategoryName($id) . '</h2>';
        echo '</div>';
        echo '<div class="pricing-box-content">';
        echo '<ul>';
        foreach ($array as $key => $values) {
            echo '<li><i class="fa fa-inbox"></i> ' . CHtml::link($values['title'], array('/content/index', 'id' => $values['id'])) . '</li>';
        }
        echo '<li><i class="fa fa-inbox"></i> ' . CHtml::link('SRO', array('sro/index', 'id' => 3)) . '</li>';
        echo '</ul>';
        echo '</div>';
        echo '</div>';
    }

    public function get_weblink__list($catid) {
        $array = Yii::app()->db->createCommand()
                ->select('id,title,click_url,created_on')
                ->from('{{weblink}}')
                ->where('published=1 AND category_id=' . $catid)
                //->order('title ASC')
                ->order('rand()')
                ->limit(10)
                ->queryAll();
        echo '<div class="pricign-box animated fadeInUp animation-delay-7">';
        echo '<div class="pricing-box-header">';
        echo '<h2>' . WeblinkCategory::get_category($catid) . '</h2>';
        echo '</div>';
        echo '<div class="pricing-box-content">';
        echo '<ul>';
        foreach ($array as $key => $values) {
            echo '<li><i class="fa fa-cloud-download"></i> ' . CHtml::link($values['title'], $values['click_url'], array('class' => '', 'target' => '_blank')) . '</li>';
        }
        echo '</ul>';
        echo '</div>';
        echo '</div>';
    }

    public function get_document_category_list() {
        $array = Yii::app()->db->createCommand()
                ->select('id,title,created_time')
                ->from('{{document_category}}')
                ->where('published=1 AND parent=0')
                ->order('title ASC')
                ->queryAll();
        echo '<ul class="media-list">';
        foreach ($array as $key => $values) {
            echo '<li class="media">';
            echo '<div class = "media-body">';
            echo '<div><i class="fa fa-external-link-square"></i> ' . CHtml::link($values['title'], array('/document/index', 'id' => $values['id'])) . '</div>';
            echo '</div>';
            echo '</li>';
        }
        echo '</ul>';
    }

    public function get_supported_by($catid) {
        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{banner}}')
                ->where('published=1 AND catid=' . $catid)
                ->limit(6)
                ->order('created_on DESC')
                ->queryAll();

        foreach ($array as $key => $values) {
            echo '<div class="col-md-2">';
            $banner = CHtml::image(Yii::app()->baseUrl . '/uploads/banners/' . $values['banner'], $values['name'], array("class" => 'img-responsive imageborder', 'title' => $values['name']));
            echo CHtml::link($banner, $values['clickurl'], array('target' => '_blank'));
            echo '</div>';
        }
    }

    public function get_youtube_video() {
        $value = Yii::app()->db->createCommand()
                ->select('youtube_id')
                ->from('{{youtube}}')
                ->where('featured=1')
                ->limit('1')
                ->order('created_on DESC')
                ->queryScalar();
        return $value;
    }

    public function get_advertisement($catid) {
        $array = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{banner}}')
                ->where('published=1 AND catid=' . $catid)
                ->order('created_on DESC')
                ->queryAll();

        foreach ($array as $key => $values) {
            echo '<div style="margin-bottom:5px;">';
            $banner = CHtml::image(Yii::app()->baseUrl . '/uploads/banners/' . $values['banner'], $values['name'], array('class' => 'img-post img-responsive', 'title' => $values['name']));
            echo CHtml::link($banner, $values['clickurl'], array('target' => '_blank'));
            echo '</div>';
        }
    }

}
