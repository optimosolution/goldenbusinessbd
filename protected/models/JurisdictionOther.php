<?php

/**
 * This is the model class for table "{{jurisdiction_other}}".
 *
 * The followings are the available columns in table '{{jurisdiction_other}}':
 * @property integer $id
 * @property integer $income_source
 * @property integer $district
 * @property integer $profession_type
 * @property string $letter_specific_name
 * @property integer $zone
 * @property integer $range
 * @property integer $circle
 *
 * The followings are the available model relations:
 * @property JurisdictionIncomeSource $incomeSource
 * @property JurisdictionDistrict $district0
 * @property JurisdictionLocation $professionType
 * @property JurisdictionZone $zone0
 * @property JurisdictionCircle $circle0
 */
class JurisdictionOther extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{jurisdiction_other}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('income_source, district, profession_type, zone, circle', 'required'),
            array('income_source, district, profession_type, zone, range, circle', 'numerical', 'integerOnly' => true),
            array('letter_specific_name', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, income_source, district, profession_type, letter_specific_name, zone, range, circle', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'incomeSource' => array(self::BELONGS_TO, 'JurisdictionIncomeSource', 'income_source'),
            'district0' => array(self::BELONGS_TO, 'JurisdictionDistrict', 'district'),
            'professionType' => array(self::BELONGS_TO, 'JurisdictionLocation', 'profession_type'),
            'zone0' => array(self::BELONGS_TO, 'JurisdictionZone', 'zone'),
            'circle0' => array(self::BELONGS_TO, 'JurisdictionCircle', 'circle'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'income_source' => 'Income Source',
            'district' => 'District',
            'profession_type' => 'Profession Type/ Location',
            'letter_specific_name' => 'Letter or Specific Name',
            'zone' => 'Zone',
            'range' => 'Range',
            'circle' => 'Circle',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('income_source', $this->income_source);
        $criteria->compare('district', $this->district);
        $criteria->compare('profession_type', $this->profession_type);
        $criteria->compare('letter_specific_name', $this->letter_specific_name, true);
        $criteria->compare('zone', $this->zone);
        $criteria->compare('range', $this->range);
        $criteria->compare('circle', $this->circle);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return JurisdictionOther the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function get_list_frontend($controller, $field, $id) {
        $rValue = Yii::app()->db->createCommand()
                ->select('id,profession_type,letter_specific_name')
                ->from('{{jurisdiction_other}}')
                //->where('letter_specific_name IS NOT NULL')
                ->order('letter_specific_name')
                ->queryAll();
        echo '<select id="' . $controller . '_' . $field . '" name="' . $controller . '[' . $field . ']" class="form-control">';
        echo '<option value="">--select--</option>';
        foreach ($rValue as $key => $values) {
            if ($values["letter_specific_name"] == $id) {
                echo '<option selected="selected" value="' . $values["letter_specific_name"] . '" class="' . $values["profession_type"] . '">' . $values["letter_specific_name"] . '</option>';
            } else {
                echo '<option value="' . $values["letter_specific_name"] . '" class="' . $values["profession_type"] . '">' . $values["letter_specific_name"] . '</option>';
            }
        }
        echo '</select>';
    }

}
