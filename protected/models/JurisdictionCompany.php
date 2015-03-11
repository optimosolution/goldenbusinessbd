<?php

/**
 * This is the model class for table "{{jurisdiction_company}}".
 *
 * The followings are the available columns in table '{{jurisdiction_company}}':
 * @property integer $id
 * @property integer $district_id
 * @property integer $company_id
 * @property integer $character_id
 * @property string $assessee
 * @property integer $zone
 * @property integer $circle
 *
 * The followings are the available model relations:
 * @property JurisdictionDistrict $district
 * @property JurisdictionCompanyType $company
 * @property JurisdictionCharacter $character
 * @property JurisdictionZone $zone0
 * @property JurisdictionCircle $circle0
 */
class JurisdictionCompany extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{jurisdiction_company}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('district_id, company_id, character_id, zone, circle', 'numerical', 'integerOnly' => true),
            array('assessee', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, district_id, company_id, character_id, assessee, zone, circle', 'safe', 'on' => 'search'),
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
            'company' => array(self::BELONGS_TO, 'JurisdictionCompanyType', 'company_id'),
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
            'company_id' => 'Company Type',
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
        $criteria->compare('company_id', $this->company_id);
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
     * @return JurisdictionCompany the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
