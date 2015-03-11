<?php

/**
 * This is the model class for table "{{jurisdiction_zone}}".
 *
 * The followings are the available columns in table '{{jurisdiction_zone}}':
 * @property integer $id
 * @property string $tax_taxes_zone
 *
 * The followings are the available model relations:
 * @property JurisdictionCircle[] $jurisdictionCircles
 */
class JurisdictionZone extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{jurisdiction_zone}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('tax_taxes_zone', 'required'),
            array('tax_taxes_zone', 'length', 'max' => 200),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, tax_taxes_zone', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'jurisdictionCircles' => array(self::HAS_MANY, 'JurisdictionCircle', 'zone_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'tax_taxes_zone' => 'Zone',
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
        $criteria->compare('tax_taxes_zone', $this->tax_taxes_zone, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return JurisdictionZone the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function get_title($id) {
        $value = JurisdictionZone::model()->findByAttributes(array('id' => $id));
        if (empty($value->tax_taxes_zone)) {
            return null;
        } else {
            return $value->tax_taxes_zone;
        }
    }

}
