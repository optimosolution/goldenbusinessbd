<?php

class UserAdminController extends BackEndController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    protected function beforeAction($action) {
        $access = $this->checkAccess(Yii::app()->controller->id, Yii::app()->controller->action->id);
        if ($access == 1) {
            return true;
        } else {
            Yii::app()->user->setFlash('error', "You are not authorized to perform this action!");
            $this->redirect(array('/site/noaccess'));
        }
    }

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
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
                'actions' => array('index', 'view'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('admin', 'create', 'update', 'view', 'edit'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'create', 'update', 'view', 'edit'),
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
        //get Audit Trail
        $model_AuditTrail = new AuditTrail('search_user_only');
        $model_AuditTrail->unsetAttributes();  // clear any default values
        if (isset($_GET['AuditTrail']))
            $model_AuditTrail->attributes = $_GET['AuditTrail'];

        //Visitor statistics
        $model_Visitor = new Visitor('search_user_only');
        $model_Visitor->unsetAttributes();  // clear any default values
        if (isset($_GET['Visitor']))
            $model_Visitor->attributes = $_GET['Visitor'];

        $this->render('view', array(
            'model' => $this->loadModel($id),
            'model_AuditTrail' => $model_AuditTrail,
            'model_Visitor' => $model_Visitor,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {

        $model = new UserAdmin;

        //picture path
        $path = Yii::app()->basePath . '/../uploads/profile_picture';
        if (!is_dir($path)) {
            mkdir($path);
        }

        if (isset($_POST['UserAdmin'])) {
            $model->attributes = $_POST['UserAdmin'];
            if ($model->validate()) {
                $model->password = SHA1($model->password);
                $model->registerDate = new CDbExpression('NOW()');
                $model->activation = md5(microtime());
                //Picture upload script
                if (@!empty($_FILES['UserAdmin']['name']['profile_picture'])) {
                    $model->profile_picture = $_POST['UserAdmin']['profile_picture'];

                    if ($model->validate(array('profile_picture'))) {
                        $model->profile_picture = CUploadedFile::getInstance($model, 'profile_picture');
                    } else {
                        $model->profile_picture = '';
                    }
                    $model->profile_picture->saveAs($path . '/' . time() . '_' . str_replace(' ', '_', strtolower($model->profile_picture)));
                    $model->profile_picture = time() . '_' . str_replace(' ', '_', strtolower($model->profile_picture));
                }
                if ($model->save()) {
                    Yii::app()->user->setFlash('success', 'User has been created successfully');
                    $this->redirect(array('view', 'id' => $model->id));
                }
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {

        $model = $this->loadModel($id);

        //get profile picture
        $previuosFileName = $model->profile_picture;
        $path = Yii::app()->basePath . '/../uploads/profile_picture';
        if (!is_dir($path)) {
            mkdir($path);
        }

        if (isset($_POST['UserAdmin'])) {
            $model->attributes = $_POST['UserAdmin'];
            if ($model->validate()) {
                //Picture upload script
                if (@!empty($_FILES['UserAdmin']['name']['profile_picture'])) {
                    $model->profile_picture = $_POST['UserAdmin']['profile_picture'];

                    if ($model->validate(array('profile_picture'))) {
                        $filePath = Yii::app()->basePath . '/../uploads/profile_picture/' . $previuosFileName;
                        if ((is_file($filePath)) && (file_exists($filePath))) {
                            unlink($filePath);
                        }
                        $model->profile_picture = CUploadedFile::getInstance($model, 'profile_picture');
                    } else {
                        $model->profile_picture = '';
                    }
                    $model->profile_picture->saveAs($path . '/' . time() . '_' . str_replace(' ', '_', strtolower($model->profile_picture)));
                    $model->profile_picture = time() . '_' . str_replace(' ', '_', strtolower($model->profile_picture));
                } else {
                    $model->profile_picture = $previuosFileName;
                }
                if ($model->save()) {
                    Yii::app()->user->setFlash('success', 'User has been updated successfully');
                    $this->redirect(array('view', 'id' => $model->id));
                }
            }
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionEdit($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['UserAdmin'])) {
            $model->attributes = $_POST['UserAdmin'];
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

        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $this->redirect(array('admin'));
        $dataProvider = new CActiveDataProvider('UserAdmin');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {

        $model = new UserAdmin('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['UserAdmin']))
            $model->attributes = $_GET['UserAdmin'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = UserAdmin::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-admin-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
