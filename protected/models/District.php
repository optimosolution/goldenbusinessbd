<?php

/**
 * This is the model class for table "{{district}}".
 *
 * The followings are the available columns in table '{{district}}':
 * @property string $id
 * @property integer $country_id
 * @property integer $state_id
 * @property integer $city_id
 * @property string $title
 * @property integer $published
 */
class District extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return District the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{district}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('state_id, city_id, title', 'required'),
            array('country_id, state_id, city_id, published', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 100),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, country_id, state_id, city_id, title, published', 'safe', 'on' => 'search'),
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
            'country_id' => 'Country',
            'state_id' => 'State',
            'city_id' => 'City',
            'title' => 'Title',
            'published' => 'Published',
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
        $criteria->compare('country_id', $this->country_id);
        $criteria->compare('state_id', $this->state_id);
        $criteria->compare('city_id', $this->city_id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('published', $this->published);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            ),
        ));
    }

    public static function getDistrict($id) {
        $value = District::model()->findByAttributes(array('id' => $id));
        if (empty($value->title)) {
            return 'Not set';
        } else {
            return $value->title;
        }
    }

    public static function getDistrictBYUserid($user_id) {
        $value = UserProfile::model()->findByAttributes(array('user_id' => $user_id));
        if (empty($value->district_id)) {
            return 13;
        } else {
            return $value->district_id;
        }
    }
    
    public static function get_district_list($controller, $field, $id) {
        $rValue = Yii::app()->db->createCommand()
                ->select('id,city_id,title')
                ->from('{{district}}')
                ->where('published=1')
                ->order('title')
                ->queryAll();
        echo '<select id="' . $controller . '_' . $field . '" name="' . $controller . '[' . $field . ']" class="span12">';
        echo '<option value="">--select district--</option>';
        foreach ($rValue as $key => $values) {
            if ($values["id"] == $id) {
                echo '<option selected="selected" value="' . $values["id"] . '" class="' . $values["city_id"] . '">' . $values["title"] . '</option>';
            } else {
                echo '<option value="' . $values["id"] . '" class="' . $values["city_id"] . '">' . $values["title"] . '</option>';
            }
        }
        echo '</select>';
    }

}