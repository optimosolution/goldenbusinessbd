<?php

/**
 * This is the model class for table "{{yiisession}}".
 *
 * The followings are the available columns in table '{{yiisession}}':
 * @property string $id
 * @property integer $expire
 * @property string $data
 * @property integer $userId
 * @property integer $userType
 */
class OnlineUser extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return OnlineUser the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{yiisession}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id', 'required'),
            array('expire, userId, userType', 'numerical', 'integerOnly' => true),
            array('id', 'length', 'max' => 32),
            array('data', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, expire, data, userId, userType', 'safe', 'on' => 'search'),
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
            'expire' => 'Activity',
            'data' => 'Data',
            'userId' => 'User',
            'userType' => 'User Type',
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
        $criteria->alias = 't';
        $criteria->condition = 't.userId IS NOT NULL AND t.userType=1';

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.expire', $this->expire);
        $criteria->compare('t.data', $this->data, true);
        $criteria->compare('t.userId', $this->userId);
        $criteria->compare('t.userType', $this->userType);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 20,
            ),
            'sort' => array('defaultOrder' => 't.expire DESC')
        ));
    }
    
    public function search_user() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;
        $criteria->alias = 't';
        $criteria->condition = 't.userId IS NOT NULL AND t.userType=0';

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.expire', $this->expire);
        $criteria->compare('t.data', $this->data, true);
        $criteria->compare('t.userId', $this->userId);
        $criteria->compare('t.userType', $this->userType);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 20,
            ),
            'sort' => array('defaultOrder' => 't.expire DESC')
        ));
    }

    public static function get_ts_time($unixtime) {
        return date('Y-m-d h:i:s', $unixtime);
    }

    public static function get_current_time() {
        return date('Y-m-d h:i:s', time());
    }

    //get online status
    public static function get_online_status($id) {
        $title = OnlineUser::model()->findByAttributes(array('userId' => $id));
        if (!empty($title->userId)) {
            return '<span class="label label-purple arrowed-in-right"> <i class="icon-circle"></i> Online</span>';
        } else {
            return '<span class="label label-lg label-grey arrowed-in"> <i class="icon-circle"></i> Offline</span>';
        }
    }

    //Shut down
    public static function shut_down($id) {
        return CHtml::link('<i class="icon-trash bigger-130 red"></i>', array('/onlineUser/delete', 'id' => $id), array('class' => '', 'confirm' => 'Are you sure you want to Shut down this user?'));
    }

}