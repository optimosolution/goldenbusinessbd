<?php

/**
 * This is the model class for table "{{country}}".
 *
 * The followings are the available columns in table '{{country}}':
 * @property integer $id
 * @property integer $worldzone_id
 * @property string $country_name
 * @property string $country_3_code
 * @property string $country_2_code
 * @property integer $ordering
 * @property integer $published
 * @property string $created_on
 * @property integer $created_by
 * @property string $modified_on
 * @property integer $modified_by
 * @property string $locked_on
 * @property integer $locked_by
 */
class Country extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Country the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{country}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('worldzone_id, ordering, published, created_by, modified_by, locked_by', 'numerical', 'integerOnly' => true),
            array('country_name', 'length', 'max' => 255),
            array('country_3_code', 'length', 'max' => 3),
            array('country_2_code', 'length', 'max' => 2),
            array('created_on, modified_on, locked_on', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, worldzone_id, country_name, country_3_code, country_2_code, ordering, published, created_on, created_by, modified_on, modified_by, locked_on, locked_by', 'safe', 'on' => 'search'),
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
            'worldzone_id' => 'Worldzone',
            'country_name' => 'Country Name',
            'country_3_code' => 'Country 3 Code',
            'country_2_code' => 'Country 2 Code',
            'ordering' => 'Ordering',
            'published' => 'Published',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
            'modified_on' => 'Modified On',
            'modified_by' => 'Modified By',
            'locked_on' => 'Locked On',
            'locked_by' => 'Locked By',
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
        $criteria->compare('worldzone_id', $this->worldzone_id);
        $criteria->compare('country_name', $this->country_name, true);
        $criteria->compare('country_3_code', $this->country_3_code, true);
        $criteria->compare('country_2_code', $this->country_2_code, true);
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

    public static function getCountry($id) {
        $value = Country::model()->findByAttributes(array('id' => $id));
        if (empty($value->country_name)) {
            return null;
        } else {
            return $value->country_name;
        }
    }

}