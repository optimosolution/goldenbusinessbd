<?php

class DocumentController extends BackEndController {

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
                'actions' => array('create', 'update', 'admin', 'delete', 'download'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('create', 'update', 'admin', 'delete', 'download'),
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
        $model = new Document;

        $path = Yii::app()->basePath . '/../uploads/documents';
        if (!is_dir($path)) {
            mkdir($path);
        }

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Document'])) {
            $model->attributes = $_POST['Document'];
            if ($model->validate()) {
                //Document upload script
                if (@!empty($_FILES['Document']['name']['doc_file'])) {
                    $model->doc_file = $_POST['Document']['doc_file'];

                    if ($model->validate(array('doc_file'))) {
                        $model->doc_file = CUploadedFile::getInstance($model, 'doc_file');
                    } else {
                        $model->doc_file = '';
                    }
                    $model->doc_file->saveAs($path . '/' . time() . '_' . str_replace(' ', '_', strtolower($model->doc_file)));
                    $model->doc_type = $model->doc_file->getType();
                    $model->doc_size = $model->doc_file->getSize();
                    $model->doc_file = time() . '_' . str_replace(' ', '_', strtolower($model->doc_file));
                }

                $model->created_on = new CDbExpression('NOW()');
                $model->created_by = Yii::app()->user->id;
                if ($model->save()) {
                    Yii::app()->user->setFlash('success', 'Document created successfully');
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

        $previuosFileName = $model->doc_file;
        $path = Yii::app()->basePath . '/../uploads/documents';
        if (!is_dir($path)) {
            mkdir($path);
        }

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Document'])) {
            $model->attributes = $_POST['Document'];
            if ($model->validate()) {
                //Document upload script
                if (@!empty($_FILES['Document']['name']['doc_file'])) {
                    $model->doc_file = $_POST['Document']['doc_file'];

                    if ($model->validate(array('doc_file'))) {
                        $myFile = $path . '/' . $previuosFileName;
                        if ((is_file($myFile)) && (file_exists($myFile))) {
                            unlink($myFile);
                        }
                        $model->doc_file = CUploadedFile::getInstance($model, 'doc_file');
                    } else {
                        $model->doc_file = '';
                    }
                    $model->doc_file->saveAs($path . '/' . time() . '_' . str_replace(' ', '_', strtolower($model->doc_file)));
                    $model->doc_type = $model->doc_file->getType();
                    $model->doc_size = $model->doc_file->getSize();
                    $model->doc_file = time() . '_' . str_replace(' ', '_', strtolower($model->doc_file));
                } else {
                    $model->doc_file = $previuosFileName;
                }
                $model->modified_on = new CDbExpression('NOW()');
                $model->modified_by = Yii::app()->user->id;
                if ($model->save()) {
                    Yii::app()->user->setFlash('success', 'Document saved successfully');
                    $this->redirect(array('view', 'id' => $model->id));
                }
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
    /*
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
     */
    public function actionDelete($id) {
        $model = $this->loadModel($id);
        if (Yii::app()->request->isPostRequest) {

            try {
                $myFile = Yii::app()->basePath . '/../uploads/documents/' . $model->doc_file;
                if (!empty($model->doc_file)) {
                    unlink($myFile);
                }
                $this->loadModel($id)->delete();

                if (!isset($_GET['ajax'])) {
                    Yii::app()->user->setFlash('success', 'Deleted Successfully');
                } else {
                    echo "<div class='flash-success'>Deleted Successfully</div>";
                }
            } catch (CDbException $e) {
                if (!isset($_GET['ajax'])) {
                    Yii::app()->user->setFlash('error', 'You are not authorized to perform this action');
                } else {
                    echo "<div class='flash-error'>You are not authorized to perform this action</div>"; //for ajax
                }
            }
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
        $dataProvider = new CActiveDataProvider('Document');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Document('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Document']))
            $model->attributes = $_GET['Document'];

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
        $model = Document::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'document-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * Download a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionDownload($id) {
        $this->render('download', array(
            'model' => $this->loadModel($id),
        ));
    }

}
