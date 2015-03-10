<?php

class SiteController extends Controller {

    public $layout = '//layouts/column2';

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'contact', 'login', 'logout', 'captcha', 'subscrib'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'admin', 'delete', 'logout'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('create', 'update', 'admin', 'delete', 'logout'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    public function actionSubscrib() {
        $model = new Subscriber;
        $model->full_name = 'Guest';
        $model->email = $_POST['Subscriber']['email'];
        $model->user_id = Yii::app()->user->id;
        $model->key = md5(time());
        $validator = new CEmailValidator;
        if ($validator->validateValue($model->email)) {
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'Subscription completed. Your email will be added to our distribution list.');
                $this->redirect(array('site/index'));
            } else {
                Yii::app()->user->setFlash('danger', 'Subscription not completed. Your email already in my Subscriber list!.');
                $this->redirect(array('site/index'));
            }
        } else {
            Yii::app()->user->setFlash('danger', 'Subscription not completed. Your email not valid!.');
            $this->redirect(array('site/index'));
        }
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        $this->pageTitle = Yii::app()->name;
        Yii::app()->clientScript->registerMetaTag(Yii::app()->name . ' - Largest and fastest growing business Portals in Bangladesh.', 'description');
        Yii::app()->clientScript->registerMetaTag("fastest,growing,business,Portals,Bangladesh,Golden,Jahangir", 'keywords');
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $this->render('index');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $this->layout = 'column2';
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginFormUser;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginFormUser'])) {
            $model->attributes = $_POST['LoginFormUser'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
                $audit = new AuditTrail;
                $audit->user_id = Yii::app()->user->id;
                $audit->user_type = 0;
                $audit->login_time = new CDbExpression('NOW()');
                $audit->save();
                Yii::app()->user->setFlash('success', 'Welcome in the <strong>' . CHtml::encode(Yii::app()->name) . '</strong>. Don\'t forget to <strong>Logout</strong> when finish!');
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        if (@Yii::app()->user->id) {
            Yii::app()->db->createCommand('UPDATE {{audit_trail}} SET `logout_time` = NOW() WHERE user_id=' . Yii::app()->user->id . ' ORDER BY login_time DESC LIMIT 1')->execute();
        }

        Yii::app()->user->logout();
        Yii::app()->user->setFlash('success', 'Logout Successful! You can improve your security further after logging out by closing this opened browser.');
        $this->redirect(Yii::app()->homeUrl);
    }

}
