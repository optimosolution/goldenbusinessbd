<?php

/**
 * This is the model class for table "{{city}}".
 *
 * The followings are the available columns in table '{{city}}':
 * @property string $id
 * @property integer $country_id
 * @property integer $state_id
 * @property string $city_name
 * @property string $city_3_code
 * @property string $city_2_code
 * @property double $ordering
 * @property integer $published
 * @property string $created_on
 * @property double $created_by
 * @property string $modified_on
 * @property double $modified_by
 * @property string $locked_on
 * @property double $locked_by
 */
class City extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return City the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{city}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('country_id, state_id, city_name', 'required'),
            array('country_id, state_id, published', 'numerical', 'integerOnly' => true),
            array('ordering, created_by, modified_by, locked_by', 'numerical'),
            array('city_name', 'length', 'max' => 255),
            array('city_3_code', 'length', 'max' => 9),
            array('city_2_code', 'length', 'max' => 6),
            array('created_on, modified_on, locked_on', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, country_id, state_id, city_name, city_3_code, city_2_code, ordering, published, created_on, created_by, modified_on, modified_by, locked_on, locked_by', 'safe', 'on' => 'search'),
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
            'country_id' => Yii::t('City', "Country"),
            'state_id' => Yii::t('City', "State"),
            'city_name' => Yii::t('City', "City Name"),
            'city_3_code' => Yii::t('City', "City 3 Code"),
            'city_2_code' => Yii::t('City', "City 2 Code"),
            'ordering' => Yii::t('City', "Ordering"),
            'published' => Yii::t('City', "Published"),
            'created_on' => Yii::t('City', "Created On"),
            'created_by' => Yii::t('City', "Created By"),
            'modified_on' => Yii::t('City', "Modified On"),
            'modified_by' => Yii::t('City', "Modified By"),
            'locked_on' => Yii::t('City', "Locked On"),
            'locked_by' => Yii::t('City', "Locked By"),
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
        $criteria->compare('city_name', $this->city_name, true);
        $criteria->compare('city_3_code', $this->city_3_code, true);
        $criteria->compare('city_2_code', $this->city_2_code, true);
        $criteria->compare('ordering', $this->ordering);
        $criteria->compare('published', $this->published);
        $criteria->compare('created_on', $this->created_on, true);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('modified_on', $this->modified_on, true);
        $criteria->compare('modified_by', $this->modified_by);
        $criteria->compare('locked_on', $this->locked_on, true);
        $criteria->compare('locked_by', $this->locked_by);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            ),
        ));
    }

    /**
     * Retrieves User name by ID.
     * @return string.
     */
    public function getUserName($id) {
        $returnValue = Yii::app()->db->createCommand()
                ->select('name')
                ->from('{{user_admin}}')
                ->where('id=:id', array(':id' => $id))
                ->queryScalar();

        return $returnValue;
    }

    /**
     * Retrieves Country name by ID.
     * @return string.
     */
    public function getCountryName($id) {
        $returnValue = Yii::app()->db->createCommand()
                ->select('country_name')
                ->from('{{country}}')
                ->where('id=:id', array(':id' => $id))
                ->queryScalar();

        return $returnValue;
    }

    /**
     * Retrieves State name by ID.
     * @return string.
     */
    public function getStateName($id) {
        $returnValue = Yii::app()->db->createCommand()
                ->select('state_name')
                ->from('{{state}}')
                ->where('id=:id', array(':id' => $id))
                ->queryScalar();

        return $returnValue;
    }

    public static function getCity($id) {
        $value = City::model()->findByAttributes(array('id' => $id));
        if (empty($value->city_name)) {
            return null;
        } else {
            return $value->city_name;
        }
    }

    public static function get_city_list($controller, $field, $id) {
        $rValue = Yii::app()->db->createCommand()
                ->select('id,state_id,city_name')
                ->from('{{city}}')
                ->where('published=1')
                ->order('city_name')
                ->queryAll();
        echo '<select id="' . $controller . '_' . $field . '" name="' . $controller . '[' . $field . ']" class="span12">';
        echo '<option value="">--select city--</option>';
        foreach ($rValue as $key => $values) {
            if ($values["id"] == $id) {
                echo '<option selected="selected" value="' . $values["id"] . '" class="' . $values["state_id"] . '">' . $values["city_name"] . '</option>';
            } else {
                echo '<option value="' . $values["id"] . '" class="' . $values["state_id"] . '">' . $values["city_name"] . '</option>';
            }
        }
        echo '</select>';
    }

}
