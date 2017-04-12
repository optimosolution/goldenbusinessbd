<?php

class ExamQuestionController extends BackEndController {

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
                'actions' => array('*'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('admin', 'delete', 'create', 'update', 'view', 'add', 'remove'),
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
        $modelForm = new ExamAnswer;

        $modelAnswer = new ExamAnswer('search');
        $modelAnswer->unsetAttributes();  // clear any default values
        if (isset($_GET['ExamAnswer'])) {
            $modelAnswer->attributes = $_GET['ExamAnswer'];
        }

//        if (isset($_POST['ExamAnswer'])) {
//            $modelForm->attributes = $_POST['ExamAnswer'];
//            if ($modelForm->save()) {
//                $this->redirect(array('view', 'id' => $modelForm->question));
//                Yii::app()->user->setFlash('success', 'Answer was added successfully!');
//            }
//        }

        $this->render('view', array(
            'model' => $this->loadModel($id),
            'modelAnswer' => $modelAnswer,
            'modelForm' => $modelForm,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new ExamQuestion;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['ExamQuestion'])) {
            $model->attributes = $_POST['ExamQuestion'];
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id));
                //$this->redirect(array('admin'));
                Yii::app()->user->setFlash('success', 'Data was saved successfully!');
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionAdd() {
        $model = new ExamAnswer;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['ExamAnswer'])) {
            $model->attributes = $_POST['ExamAnswer'];
            if ($model->validate()) {
                if ($model->save()) {
                    echo $model->id;
                } else {
                    echo "false";
                }
            }
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['ExamQuestion'])) {
            $model->attributes = $_POST['ExamQuestion'];
            if ($model->save()) {
                //$this->redirect(array('view', 'id' => $model->id));
                $this->redirect(array('admin'));
                Yii::app()->user->setFlash('success', 'Data was saved successfully!');
            }
        }

        $this->render('update', array(
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
            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

    public function actionRemove($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModelAnswer($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('ExamQuestion');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new ExamQuestion('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['ExamQuestion'])) {
            $model->attributes = $_GET['ExamQuestion'];
        }

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return ExamQuestion the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = ExamQuestion::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $model;
    }

    public function loadModelAnswer($id) {
        $model = ExamAnswer::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param ExamQuestion $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'exam-question-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
