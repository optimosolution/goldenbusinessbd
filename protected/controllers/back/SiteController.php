<?php

class SiteController extends BackEndController {

    public $layout = '//layouts/column2';

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

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
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
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactFormAdmin'];
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
        $this->layout = '//layouts/login';
        if (@Yii::app()->user->id) {
            $this->redirect(Yii::app()->homeUrl);
        }
        $model = new LoginFormAdmin;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginFormAdmin'])) {
            $model->attributes = $_POST['LoginFormAdmin'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
                $audit = new AuditTrail;
                $audit->user_id = Yii::app()->user->id;
                $audit->login_time = new CDbExpression('NOW()');
                $audit->user_type = 1;
                $audit->save();
                Yii::app()->user->setFlash('success', 'Welcome in the <strong>' . CHtml::encode(Yii::app()->name) . ' Admin Panel</strong>. Don\'t forget to <strong>Logout</strong> when finish!');
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
        Yii::app()->user->setFlash('success', 'Logout Successful!');
        $this->redirect(Yii::app()->homeUrl);
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionNoaccess() {
        $this->render('noaccess');
    }

}