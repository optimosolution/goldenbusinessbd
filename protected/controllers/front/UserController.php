<?php

class UserController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('create', 'index'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('update', 'view'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new User;
        $model_profile = new UserProfile;
        $path = Yii::app()->basePath . '/../uploads/profile_picture';
        if (!is_dir($path)) {
            mkdir($path);
        }
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            $model_profile->attributes = $_POST['UserProfile'];
            $model->back_pwd = $model->password;
            $model->password = SHA1($model->password);
            $model->registerDate = new CDbExpression('NOW()');
            $model->activation = md5(microtime());
            $model->group_id = 7;
            $model->status = 1;
            $model->user_type = 0;
            if ($model->validate()) {
                //Picture upload script
                if (@!empty($_FILES['UserProfile']['name']['profile_picture'])) {
                    $model_profile->profile_picture = $_POST['UserProfile']['profile_picture'];

                    if ($model_profile->validate(array('profile_picture'))) {
                        $model_profile->profile_picture = CUploadedFile::getInstance($model_profile, 'profile_picture');
                    } else {
                        $model_profile->profile_picture = '';
                    }
                    $model_profile->profile_picture->saveAs($path . '/' . time() . '_' . str_replace(' ', '_', strtolower($model_profile->profile_picture)));
                    $model_profile->profile_picture = time() . '_' . str_replace(' ', '_', strtolower($model_profile->profile_picture));
                }
                if ($model->save()) {
                    $identity = new UserIdentity($model->username, $model->back_pwd);
                    $identity->authenticate();
                    Yii::app()->user->login($identity);

                    $model_profile->user_id = $model->id;
                    $model_profile->save();
                    Yii::app()->user->setFlash('success', 'Registration was completed successfully!');
                    $this->redirect(array('view', 'id' => $model->id));
                }
            }
        }

        $this->render('create', array(
            'model' => $model,
            'model_profile' => $model_profile,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        $profile_id = $this->get_profile_id($id);
        $model_profile = $this->loadModelProfile($profile_id);

        $previuosFileName = $model_profile->profile_picture;
        $path = Yii::app()->basePath . '/../uploads/profile_picture';
        if (!is_dir($path)) {
            mkdir($path);
        }

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            $model_profile->attributes = $_POST['UserProfile'];
            if ($model->validate()) {
                //Picture upload script
                if (@!empty($_FILES['UserProfile']['name']['profile_picture'])) {
                    $model_profile->profile_picture = $_POST['UserProfile']['profile_picture'];

                    if ($model_profile->validate(array('profile_picture'))) {
                        $filePath = Yii::app()->basePath . '/../uploads/profile_picture/' . $previuosFileName;
                        if ((is_file($filePath)) && (file_exists($filePath))) {
                            unlink($filePath);
                        }
                        $model_profile->profile_picture = CUploadedFile::getInstance($model_profile, 'profile_picture');
                    } else {
                        $model_profile->profile_picture = '';
                    }
                    $model_profile->profile_picture->saveAs($path . '/' . time() . '_' . str_replace(' ', '_', strtolower($model_profile->profile_picture)));
                    $model_profile->profile_picture = time() . '_' . str_replace(' ', '_', strtolower($model_profile->profile_picture));
                } else {
                    $model_profile->profile_picture = $previuosFileName;
                }
                if ($model->save()) {
                    $model_profile->save();
                    Yii::app()->user->setFlash('success', 'Profile updated successfully');
                    $this->redirect(array('view', 'id' => $model->id));
                }
            }
        }

        $this->render('update', array(
            'model' => $model,
            'model_profile' => $model_profile,
        ));
    }

    public function actionEdit($id) {
        $this->layout = '//layouts/column2';
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            $model->password = SHA1($model->password);
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'Password Changed successfully');
                $this->redirect(array('view', 'id' => $model->id));
            } else {
                Yii::app()->user->setFlash('error', 'Password Changed Unsuccessful!');
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('edit', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('User');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new User('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['User']))
            $model->attributes = $_GET['User'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return User the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = User::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function get_profile_id($user_id) {
        $returnValue = Yii::app()->db->createCommand()
                ->select('id')
                ->from('{{user_profile}}')
                ->where('user_id=' . $user_id)
                ->queryScalar();
        return $returnValue;
    }

    public function loadModelProfile($id) {
        $model = UserProfile::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param User $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
