<?php

class ExamController extends Controller {

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
                'actions' => array('create', 'update', 'course', 'exam', 'add', 'result'),
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

    public function actionCourse() {
        $dataProvider = new CActiveDataProvider('ExamCategory');
        $this->render('course', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionExam($id) {
        $this->render('exam', array(''));
    }

    public function actionAdd() {
        $question = $_REQUEST['question'];
        $answer = $_REQUEST['answer'];
        $category = $_REQUEST['category'];
        $correct = ExamAnswer::getCorrect($question);
        if (Yii::app()->request->isAjaxRequest) {
            if (($model = Exam::model()->find(array('condition' => 'user=' . (int) Yii::app()->user->id . ' AND category=' . (int) $category . ' AND question=' . (int) $question))) === null) {
                $model = new Exam;
                $model->user = Yii::app()->user->id;
                $model->category = $category;
                $model->question = $question;
                $model->answer = $answer;
                $model->correct = $correct;
                if ($model->save()) {
                    echo $model->id;
                } else {
                    echo "false";
                }
            } else {
                $model->question = $question;
                $model->answer = $answer;
                if ($model->save()) {
                    echo $model->id;
                } else {
                    echo "false";
                }
            }
            return;
        }
    }

    public function actionResult($id) {
        $this->render('result', array(''));
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
        $model = new Exam;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Exam'])) {
            $model->attributes = $_POST['Exam'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
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

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Exam'])) {
            $model->attributes = $_POST['Exam'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
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
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Exam');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Exam('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Exam']))
            $model->attributes = $_GET['Exam'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Exam the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Exam::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Exam $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'exam-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
