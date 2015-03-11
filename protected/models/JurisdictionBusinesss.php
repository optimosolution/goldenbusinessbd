<?php

/**
 * This is the model class for table "{{jurisdiction_businesss}}".
 *
 * The followings are the available columns in table '{{jurisdiction_businesss}}':
 * @property integer $id
 * @property integer $district_id
 * @property integer $business_id
 * @property integer $location_id
 * @property integer $character_id
 * @property string $assessee
 * @property integer $zone
 * @property integer $circle
 *
 * The followings are the available model relations:
 * @property JurisdictionDistrict $district
 * @property JurisdictionBusinessType $business
 * @property JurisdictionLocation $location
 * @property JurisdictionCharacter $character
 * @property JurisdictionZone $zone0
 * @property JurisdictionCircle $circle0
 */
class JurisdictionBusinesss extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{jurisdiction_businesss}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('district_id, assessee, zone, circle', 'required'),
            array('district_id, business_id, location_id, character_id, zone, circle', 'numerical', 'integerOnly' => true),
            array('assessee', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, district_id, business_id, location_id, character_id, assessee, zone, circle', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'district' => array(self::BELONGS_TO, 'JurisdictionDistrict', 'district_id'),
            'business' => array(self::BELONGS_TO, 'JurisdictionBusinessType', 'business_id'),
            'location' => array(self::BELONGS_TO, 'JurisdictionLocation', 'location_id'),
            'character' => array(self::BELONGS_TO, 'JurisdictionCharacter', 'character_id'),
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
            'district_id' => 'District',
            'business_id' => 'Business Type',
            'location_id' => 'Location',
            'character_id' => 'Character',
            'assessee' => 'Assessee',
            'zone' => 'Zone',
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
        $criteria->compare('district_id', $this->district_id);
        $criteria->compare('business_id', $this->business_id);
        $criteria->compare('location_id', $this->location_id);
        $criteria->compare('character_id', $this->character_id);
        $criteria->compare('assessee', $this->assessee, true);
        $criteria->compare('zone', $this->zone);
        $criteria->compare('circle', $this->circle);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return JurisdictionBusinesss the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
