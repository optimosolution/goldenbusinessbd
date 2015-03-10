<?php

class AclController extends BackEndController {

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
                'actions' => array('create', 'update', 'admin', 'delete', 'edit'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('create', 'update', 'admin', 'delete', 'edit'),
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

    public function actionEdit() {
        if (isset($_POST['updateaccess'])) {
            $usergroup = $_POST['usergroup'];
            Acl::model()->updateAll(array('access' => 0), 'group_id =' . $usergroup);
            foreach ($_POST as $key => $values) {
                $acval = explode('||', $key);
                if (isset($acval[0]) && isset($acval[1])) {
                    Acl::model()->updateAll(array('access' => $values), 'group_id ="' . $usergroup . '" AND controller = "' . $acval[0] . '" AND actions="' . $acval[1] . '"');
                }
            }
            Yii::app()->user->setFlash('success', 'Access has been saved successfully!');
            $this->redirect(array('edit', 'id' => $usergroup));
        }

        $getGroup = $_GET['id'];
        $rValue = Yii::app()->db->createCommand()
                ->select('*')
                ->from('{{acl_action}}')
                ->queryAll();
        foreach ($rValue as $key => $values) {
            $model = new Acl();
            $model->group_id = $getGroup;
            $model->controller = $this->getControllerName($values["controller_id"]);
            $model->actions = $values["action"];
            $model->action_title = $values["title"];
            $model->controller_type = $values["controller_type"];
            $model->access = 0;
            $val = $this->checkExist($model->group_id, $model->controller, $model->actions);
            if ($val <= 0) {
                $model->save();
            }
        }

        $this->render('edit');
    }

    /**
     * Check exist
     * @return string.
     */
    public function checkExist($group, $controller, $action) {
        $returnValue = Yii::app()->db->createCommand()
                ->select('COUNT(*)')
                ->from('{{acl}}')
                ->where('group_id=' . $group . ' AND controller="' . $controller . '" AND actions="' . $action . '"')
                ->queryScalar();

        return $returnValue;
    }

    /**
     * Retrieves Controller name by ID.
     * @return string.
     */
    public function getControllerName($id) {
        $returnValue = Yii::app()->db->createCommand()
                ->select('controller')
                ->from('{{acl_controller}}')
                ->where('id=:id', array(':id' => $id))
                ->queryScalar();

        return $returnValue;
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Acl;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Acl'])) {
            $model->attributes = $_POST['Acl'];
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'Saved successfully');
                $this->redirect(array('view', 'id' => $model->id));
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

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Acl'])) {
            $model->attributes = $_POST['Acl'];
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'Saved successfully');
                $this->redirect(array('view', 'id' => $model->id));
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
        $dataProvider = new CActiveDataProvider('Acl');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Acl('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Acl']))
            $model->attributes = $_GET['Acl'];

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
        $model = Acl::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'acl-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
