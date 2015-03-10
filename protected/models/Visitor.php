<?php

/**
 * This is the model class for table "{{visitor}}".
 *
 * The followings are the available columns in table '{{visitor}}':
 * @property string $id
 * @property integer $user_type
 * @property integer $user_id
 * @property string $user_name
 * @property string $page_title
 * @property string $page_link
 * @property string $server_time
 * @property string $browser
 * @property string $visitor_ip
 */
class Visitor extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Visitor the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{visitor}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_type, user_id', 'numerical', 'integerOnly' => true),
            array('user_name, browser, visitor_ip', 'length', 'max' => 100),
            array('page_title', 'length', 'max' => 255),
            array('page_link', 'length', 'max' => 150),
            array('server_time', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, user_type, user_id, user_name, page_title, page_link, server_time, browser, visitor_ip', 'safe', 'on' => 'search'),
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
            'user_type' => 'User Type',
            'user_id' => 'User',
            'user_name' => 'User Name',
            'page_title' => 'Page Title',
            'page_link' => 'Page Link',
            'server_time' => 'Server Time',
            'browser' => 'Browser',
            'visitor_ip' => 'Visitor Ip',
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
        $criteria->condition = 't.user_type=1';

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.user_type', $this->user_type);
        $criteria->compare('t.user_id', $this->user_id);
        $criteria->compare('t.user_name', $this->user_name, true);
        $criteria->compare('t.page_title', $this->page_title, true);
        $criteria->compare('t.page_link', $this->page_link, true);
        $criteria->compare('t.server_time', $this->server_time, true);
        $criteria->compare('t.browser', $this->browser, true);
        $criteria->compare('t.visitor_ip', $this->visitor_ip, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => 20,
            ),
            'sort' => array('defaultOrder' => 't.server_time DESC')
        ));
    }

    public function search_user() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;
        $criteria->alias = 't';
        $criteria->condition = 't.user_type=0';

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.user_type', $this->user_type);
        $criteria->compare('t.user_id', $this->user_id);
        $criteria->compare('t.user_name', $this->user_name, true);
        $criteria->compare('t.page_title', $this->page_title, true);
        $criteria->compare('t.page_link', $this->page_link, true);
        $criteria->compare('t.server_time', $this->server_time, true);
        $criteria->compare('t.browser', $this->browser, true);
        $criteria->compare('t.visitor_ip', $this->visitor_ip, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            ),
            'sort' => array('defaultOrder' => 't.server_time DESC')
        ));
    }

    public function search_user_front($id) {
        $criteria = new CDbCriteria;
        $criteria->alias = 't';
        $criteria->condition = 't.user_type=0 AND t.user_id=' . $id;

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.user_type', $this->user_type);
        $criteria->compare('t.user_id', $this->user_id);
        $criteria->compare('t.user_name', $this->user_name, true);
        $criteria->compare('t.page_title', $this->page_title, true);
        $criteria->compare('t.page_link', $this->page_link, true);
        $criteria->compare('t.server_time', $this->server_time, true);
        $criteria->compare('t.browser', $this->browser, true);
        $criteria->compare('t.visitor_ip', $this->visitor_ip, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            ),
            'sort' => array('defaultOrder' => 't.server_time DESC')
        ));
    }

    public function search_user_only($id, $user_type) {
        $criteria = new CDbCriteria;
        $criteria->alias = 't';
        $criteria->condition = 't.user_type=' . $user_type . ' AND t.user_id=' . $id;

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.user_type', $this->user_type);
        $criteria->compare('t.user_id', $this->user_id);
        $criteria->compare('t.user_name', $this->user_name, true);
        $criteria->compare('t.page_title', $this->page_title, true);
        $criteria->compare('t.page_link', $this->page_link, true);
        $criteria->compare('t.server_time', $this->server_time, true);
        $criteria->compare('t.browser', $this->browser, true);
        $criteria->compare('t.visitor_ip', $this->visitor_ip, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            ),
            'sort' => array('defaultOrder' => 't.server_time DESC')
        ));
    }

    public static function get_user_type($user_id, $user_type) {
        if ($user_type == 0) {
            $value = User::model()->findByAttributes(array('id' => $user_id));
        } else {
            $value = UserAdmin::model()->findByAttributes(array('id' => $user_id));
        }
        if (empty($value->name)) {
            return 'Not set!';
        } else {
            return $value->name;
        }
    }

}