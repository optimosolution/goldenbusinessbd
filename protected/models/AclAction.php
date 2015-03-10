<?php

/**
 * This is the model class for table "{{acl_action}}".
 *
 * The followings are the available columns in table '{{acl_action}}':
 * @property integer $id
 * @property integer $controller_id
 * @property string $title
 * @property string $action
 */
class AclAction extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return AclAction the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{acl_action}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('controller_id, action, title', 'required'),
            array('controller_id, controller_type', 'numerical', 'integerOnly' => true),
            array('action, title', 'length', 'max' => 150),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, controller_id, title, action, controller_type', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'controller_id' => 'Controller',
            'title' => 'Action Title',
            'action' => 'Action',
            'controller_type' => 'Type',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('controller_id', $this->controller_id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('action', $this->action, true);
        $criteria->compare('controller_type', $this->controller_type);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            ),
        ));
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function actions($id) {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;
        $criteria->condition = 't.controller_id=' . $id;
        $criteria->order = 't.action ASC';

        $criteria->compare('t.id', $this->id);
        $criteria->compare('t.controller_id', $this->controller_id);
        $criteria->compare('t.action', $this->action, true);
        $criteria->compare('t.controller_type', $this->controller_type);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 20,
            ),
        ));
    }

    /**
     * Retrieves Controller name by ID.
     * @return string.
     */
    function getControllerName($id) {
        $returnValue = Yii::app()->db->createCommand()
                ->select('controller')
                ->from('{{acl_controller}}')
                ->where('id=:id', array(':id' => $id))
                ->queryScalar();

        return $returnValue;
    }

}