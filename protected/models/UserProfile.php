<?php

/**
 * This is the model class for table "{{user_profile}}".
 *
 * The followings are the available columns in table '{{user_profile}}':
 * @property integer $id
 * @property integer $user_id
 * @property string $profile_picture
 * @property integer $country_id
 * @property integer $state_id
 * @property integer $city_id
 * @property string $address
 * @property string $mobile
 * @property string $phone
 * @property string $fax
 * @property string $website
 * @property string $expiry
 * @property string $birth_date
 */
class UserProfile extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return UserProfile the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{user_profile}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id', 'required'),
            array('user_id, country_id, state_id, city_id', 'numerical', 'integerOnly' => true),
            array('profile_picture, address', 'length', 'max' => 255),
            array('mobile, phone, fax', 'length', 'max' => 100),
            array('website', 'length', 'max' => 150),
            array('expiry, birth_date', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, user_id, profile_picture, country_id, state_id, city_id, address, mobile, phone, fax, website, expiry, birth_date', 'safe', 'on' => 'search'),
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
            'user_id' => 'User',
            'profile_picture' => 'Profile Picture',
            'country_id' => 'Country',
            'state_id' => 'State',
            'city_id' => 'City',
            'address' => 'Address',
            'mobile' => 'Mobile',
            'phone' => 'Phone',
            'fax' => 'Fax',
            'website' => 'Website',
            'expiry' => 'Expiry',
            'birth_date' => 'Birth Date',
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
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('profile_picture', $this->profile_picture, true);
        $criteria->compare('country_id', $this->country_id);
        $criteria->compare('state_id', $this->state_id);
        $criteria->compare('city_id', $this->city_id);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('mobile', $this->mobile, true);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('fax', $this->fax, true);
        $criteria->compare('website', $this->website, true);
        $criteria->compare('expiry', $this->expiry, true);
        $criteria->compare('birth_date', $this->birth_date, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            ),
        ));
    }

}