<?php

/**
 * This is the model class for table "{{subscriber}}".
 *
 * The followings are the available columns in table '{{subscriber}}':
 * @property string $id
 * @property string $full_name
 * @property string $email
 * @property string $user_id
 * @property string $created_on
 * @property integer $confirmed
 * @property integer $enabled
 * @property integer $accept
 * @property string $key
 */
class Subscriber extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Subscriber the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{subscriber}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('full_name, email', 'required'),
            array('confirmed, enabled, accept', 'numerical', 'integerOnly' => true),
            array('full_name', 'length', 'max' => 250),
            array('email', 'length', 'max' => 200),
            array('user_id', 'length', 'max' => 10),
            array('key,created_on', 'safe'),
            array('email', 'unique'),
            array('email', 'email', 'checkMX' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, full_name, email, user_id, created_on, confirmed, enabled, accept, key', 'safe', 'on' => 'search'),
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
            'full_name' => 'Full Name',
            'email' => 'Email',
            'user_id' => 'User',
            'created_on' => 'Created On',
            'confirmed' => 'Confirmed',
            'enabled' => 'Enabled',
            'accept' => 'Accept',
            'key' => 'Key',
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
        $criteria->compare('full_name', $this->full_name, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('user_id', $this->user_id, true);
        $criteria->compare('created_on', $this->created_on, true);
        $criteria->compare('confirmed', $this->confirmed);
        $criteria->compare('enabled', $this->enabled);
        $criteria->compare('accept', $this->accept);
        $criteria->compare('key', $this->key, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            ),
        ));
    }

}