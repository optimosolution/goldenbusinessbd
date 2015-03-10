<?php

class BackEndController extends CController {

    public $userData;
    public $layout = 'application.views.layouts.main';
    public $menu = array();
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
        if (isset(Yii::app()->user->user_type)) {
            if (Yii::app()->user->user_type == 0) {
                Yii::app()->user->setFlash('error', 'Invalid request! Please do not repeat this request again!!!!!');
                $this->redirect('http://' . $_SERVER["SERVER_NAME"]);
            }
        }
        $this->statistics();
    }

    public function checkAccess($controller, $action) {
        $val = Yii::app()->db->createCommand()
                ->select('access')
                ->from('{{acl}}')
                ->where('LOWER(controller)="' . $controller . '" AND LOWER(actions)="' . $action . '" AND group_id=' . Yii::app()->user->group . ' AND controller_type=1')
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
        $model->user_type = 1;
        $model->user_id = Yii::app()->user->id;
        $model->user_name = Yii::app()->user->name;
        $model->server_time = new CDbExpression('NOW()');
        $model->page_title = $this->pageTitle;
        $model->page_link = Yii::app()->request->url;
        $model->browser = Yii::app()->browser->getBrowser();
        $model->visitor_ip = $_SERVER['REMOTE_ADDR'];
        $model->save();
    }

    /**
     * get user full name from user id
     * @return type integer value
     */
    public function getUserNameByID($id) {
        $name = Yii::app()->db->createCommand()
                ->select('name')
                ->from('{{user_admin}} u')
                ->where('u.id=:id', array(':id' => $id))
                ->queryScalar();
        return $name;
    }

    /**
     * get user full name from session
     * @return type integer value
     */
    public function getUserName() {
        $name = Yii::app()->db->createCommand()
                ->select('name')
                ->from('{{user_admin}} u')
                ->where('u.id=:id', array(':id' => Yii::app()->user->id))
                ->queryScalar();
        return $name;
    }

}