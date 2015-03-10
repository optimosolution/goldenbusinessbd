<?php

/**
 * This is the model class for table "{{user_group}}".
 *
 * The followings are the available columns in table '{{user_group}}':
 * @property string $id
 * @property string $title
 * @property string $details
 */
class UserGroup extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return UserGroup the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{user_group}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title', 'required'),
            array('title', 'length', 'max' => 100),
            array('details', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, title, details', 'safe', 'on' => 'search'),
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
            'title' => 'Title',
            'details' => 'Details',
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

        $criteria->compare('id', $this->id, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('details', $this->details, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            ),
        ));
    }

    public static function get_user_group($id) {
        $title = UserGroup::model()->findByAttributes(array('id' => $id));
        if (!empty($title->title)) {
            return $title->title;
        } else {
            return 'All';
        }
    }

    public static function get_set_access($id) {
        $link = CHtml::link('<span class="label label-important arrowed-in">Set Access</span>', array('acl/edit', 'id' => $id), array('data-rel' => 'tooltip', 'title' => 'Set group permission!', 'data-placement' => 'top'));
        return $link;
    }

}