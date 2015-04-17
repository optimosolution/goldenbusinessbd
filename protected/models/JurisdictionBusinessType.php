<?php

/**
 * This is the model class for table "{{jurisdiction_business_type}}".
 *
 * The followings are the available columns in table '{{jurisdiction_business_type}}':
 * @property integer $id
 * @property integer $btype
 * @property integer $income_source
 * @property integer $district
 * @property string $title
 *
 * The followings are the available model relations:
 * @property JurisdictionBusiness[] $jurisdictionBusinesses
 * @property JurisdictionIncomeSource $incomeSource
 * @property JurisdictionDistrict $district0
 */
class JurisdictionBusinessType extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{jurisdiction_business_type}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title', 'required'),
            array('btype, income_source, district', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, btype, income_source, district, title', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'jurisdictionBusinesses' => array(self::HAS_MANY, 'JurisdictionBusiness', 'business_type'),
            'incomeSource' => array(self::BELONGS_TO, 'JurisdictionIncomeSource', 'income_source'),
            'district0' => array(self::BELONGS_TO, 'JurisdictionDistrict', 'district'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'btype' => 'Type',
            'income_source' => 'Income Source',
            'district' => 'District',
            'title' => 'Location/Business Type',
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
        $criteria->compare('btype', $this->btype);
        $criteria->compare('income_source', $this->income_source);
        $criteria->compare('district', $this->district);
        $criteria->compare('title', $this->title, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return JurisdictionBusinessType the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function get_type_list($controller, $field, $id) {
        $rValue = Yii::app()->db->createCommand()
                ->select('id,district,title')
                ->from('{{jurisdiction_business_type}}')
                ->order('title')
                ->queryAll();
        echo '<select id="' . $controller . '_' . $field . '" name="' . $controller . '[' . $field . ']" class="span12">';
        echo '<option value="">--select type--</option>';
        foreach ($rValue as $key => $values) {
            if ($values["id"] == $id) {
                echo '<option selected="selected" value="' . $values["id"] . '" class="' . $values["district"] . '">' . $values["title"] . '</option>';
            } else {
                echo '<option value="' . $values["id"] . '" class="' . $values["district"] . '">' . $values["title"] . '</option>';
            }
        }
        echo '</select>';
    }

    public static function get_type_list_frontend($controller, $field, $id) {
        $rValue = Yii::app()->db->createCommand()
                ->select('id,district,title')
                ->from('{{jurisdiction_business_type}}')
                ->order('title')
                ->queryAll();
        echo '<select id="' . $controller . '_' . $field . '" name="' . $controller . '[' . $field . ']" class="form-control">';
        echo '<option value="">--select--</option>';
        foreach ($rValue as $key => $values) {
            if ($values["id"] == $id) {
                echo '<option selected="selected" value="' . $values["id"] . '" class="' . $values["district"] . '">' . $values["title"] . '</option>';
            } else {
                echo '<option value="' . $values["id"] . '" class="' . $values["district"] . '">' . $values["title"] . '</option>';
            }
        }
        echo '</select>';
    }

    public static function get_district_list_frontend($controller, $field, $id) {
        $rValue = Yii::app()->db->createCommand()
                ->select('id,district,btype,title')
                ->from('{{jurisdiction_business_type}}')
                ->where('district IS NOT NULL')
                ->order('district')
                ->group('district')
                ->queryAll();
        echo '<select id="' . $controller . '_' . $field . '" name="' . $controller . '[' . $field . ']" class="form-control">';
        echo '<option value="">--select--</option>';
        foreach ($rValue as $key => $values) {
            if ($values["district"] == $id) {
                echo '<option selected="selected" value="' . $values["district"] . '" class="' . $values["btype"] . '">' . JurisdictionDistrict::get_district($values["district"]) . '</option>';
            } else {
                echo '<option value="' . $values["district"] . '" class="' . $values["btype"] . '">' . JurisdictionDistrict::get_district($values["district"]) . '</option>';
            }
        }
        echo '</select>';
    }

}
