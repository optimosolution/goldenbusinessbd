<?php

/**
 * This is the model class for table "{{user}}".
 *
 * The followings are the available columns in table '{{user}}':
 * @property integer $id
 * @property string $name
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $registerDate
 * @property string $lastvisitDate
 * @property string $activation
 * @property integer $group_id
 * @property integer $status
 */
class User extends CActiveRecord {

    public $status;
    public $title;
    public $back_pwd;
    public $user_type;
    public $eminent_type;

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return User the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{user}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name, username, email, password,group_id,status', 'required'),
            array('group_id', 'numerical', 'integerOnly' => true),
            array('name', 'length', 'max' => 255),
            array('username', 'length', 'max' => 150),
            array('username', 'unique'),
            array('email', 'unique'),
            array('email, password, activation', 'length', 'max' => 100),
            array('registerDate, lastvisitDate, user_type, about_me', 'safe'),
            array('name', 'ext.alpha', 'allowNumbers' => true, 'allowSpaces' => true, 'minChars' => 3, 'extra' => array('.', '-', "'", '"', ':'), 'message' => 'Not valid. Non alpha-numeric characters (like @,#,$,_ etc.) are not allowed'),
            array('username', 'ext.alpha', 'allowNumbers' => true, 'extra' => array('.', '-', '_', "'", '"', ':'), 'minChars' => 3, 'message' => 'User name not valid'),
            array('email', 'email', 'checkMX' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, name, username, email, password, registerDate, lastvisitDate, activation,group_id,status,title', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'UserStatus' => array(self::BELONGS_TO, 'UserStatus', 'status'),
            'UserGroup' => array(self::BELONGS_TO, 'UserGroup', 'group_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'name' => 'Name',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'registerDate' => 'Joined',
            'lastvisitDate' => 'Last Online',
            'activation' => 'Activation',
            'group_id' => 'Group',
            'status' => 'Status',
            'user_type' => 'User Type',
            'about_me' => 'About Me',
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
        $criteria->compare('name', $this->name, true);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('password', $this->password, true);
        $criteria->compare('registerDate', $this->registerDate, true);
        $criteria->compare('lastvisitDate', $this->lastvisitDate, true);
        $criteria->compare('activation', $this->activation, true);
        $criteria->compare('group_id', $this->group_id);
        $criteria->compare('status', $this->status);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            ),
            'sort' => array('defaultOrder' => 'name ASC')
        ));
    }

    public function getGroupName($id) {
        $returnValue = Yii::app()->db->createCommand()
                ->select('title')
                ->from('{{user_group}}')
                ->where('id=:id', array(':id' => $id))
                ->queryScalar();

        return $returnValue;
    }

    public static function get_user_name($user_id) {
        $value = User::model()->findByAttributes(array('id' => $user_id));
        if (empty($value->name)) {
            return 'Guest';
        } else {
            return $value->name;
        }
    }

    public static function get_user_email($user_id) {
        $value = User::model()->findByAttributes(array('id' => $user_id));
        if (empty($value->email)) {
            return null;
        } else {
            return $value->email;
        }
    }

    public static function get_about_us($user_id) {
        $value = User::model()->findByAttributes(array('id' => $user_id));
        if (empty($value->about_me)) {
            return null;
        } else {
            return $value->about_me;
        }
    }

    //get profile picture for grid
    public static function get_picture_grid($id) {
        $value = UserProfile::model()->findByAttributes(array('user_id' => $id));
        $filePath = Yii::app()->basePath . '/../uploads/profile_picture/' . $value->profile_picture;
        if ((is_file($filePath)) && (file_exists($filePath))) {
            return CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $value->profile_picture, 'Profile Picture', array('alt' => User::get_user_name($value->user_id), 'class' => 'nav-user-photo', 'title' => User::get_user_name($value->user_id), 'style' => 'width:50px;'));
        } else {
            return CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/profile.jpg', 'Profile Picture', array('alt' => User::get_user_name($value->user_id), 'class' => 'nav-user-photo', 'title' => User::get_user_name($value->user_id), 'style' => 'width:50px;'));
        }
    }

    //get profile picture for grid
    public static function get_picture_about_me($id) {
        if ($id > 1000) {
            $value = UserProfile::model()->findByAttributes(array('user_id' => $id));
            $filePath = Yii::app()->basePath . '/../uploads/profile_picture/' . $value->profile_picture;
            if ((is_file($filePath)) && (file_exists($filePath))) {
                return CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $value->profile_picture, 'Profile Picture', array('alt' => User::get_user_name($value->user_id), 'class' => 'img-responsive alignleft imageborder', 'title' => User::get_user_name($value->user_id), 'style' => 'width:150px;'));
            } else {
                return CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/profile.jpg', 'Profile Picture', array('alt' => User::get_user_name($value->user_id), 'class' => 'img-responsive alignleft imageborder', 'title' => User::get_user_name($value->user_id), 'style' => 'width:150px;'));
            }
        } else {
            $value = UserAdmin::model()->findByAttributes(array('id' => $id));
            $filePath = Yii::app()->basePath . '/../uploads/profile_picture/' . $value->profile_picture;
            if ((is_file($filePath)) && (file_exists($filePath))) {
                return CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/' . $value->profile_picture, 'Profile Picture', array('alt' => $value->name, 'class' => 'img-responsive alignleft imageborder', 'title' => $value->name, 'style' => 'width:150px;'));
            } else {
                return CHtml::image(Yii::app()->baseUrl . '/uploads/profile_picture/profile.jpg', 'Profile Picture', array('alt' => $value->name, 'class' => 'img-responsive alignleft imageborder', 'title' => $value->name, 'style' => 'width:150px;'));
            }
        }
    }

}
