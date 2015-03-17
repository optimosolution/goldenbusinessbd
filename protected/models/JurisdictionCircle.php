<?php

/**
 * This is the model class for table "{{jurisdiction_circle}}".
 *
 * The followings are the available columns in table '{{jurisdiction_circle}}':
 * @property integer $id
 * @property integer $zone_id
 * @property string $tax_taxes_circle
 * @property string $address
 *
 * The followings are the available model relations:
 * @property JurisdictionZone $zone
 */
class JurisdictionCircle extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{jurisdiction_circle}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('zone_id, tax_taxes_circle, address', 'required'),
            array('zone_id, ranges', 'numerical', 'integerOnly' => true),
            array('tax_taxes_circle', 'length', 'max' => 200),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, zone_id, ranges, tax_taxes_circle, address', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'zone' => array(self::BELONGS_TO, 'JurisdictionZone', 'zone_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'zone_id' => 'Zone',
            'ranges' => 'Ranges',
            'tax_taxes_circle' => 'Circle',
            'address' => 'Address',
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
        $criteria->compare('zone_id', $this->zone_id);
        $criteria->compare('ranges', $this->ranges);
        $criteria->compare('tax_taxes_circle', $this->tax_taxes_circle, true);
        $criteria->compare('address', $this->address, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize50'],
            ),
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return JurisdictionCircle the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function get_cicle_list($controller, $field, $id) {
        $rValue = Yii::app()->db->createCommand()
                ->select('id,zone_id,tax_taxes_circle')
                ->from('{{jurisdiction_circle}}')
                ->order('tax_taxes_circle')
                ->queryAll();
        echo '<select id="' . $controller . '_' . $field . '" name="' . $controller . '[' . $field . ']" class="span12">';
        echo '<option value="">--select range--</option>';
        foreach ($rValue as $key => $values) {
            if ($values["id"] == $id) {
                echo '<option selected="selected" value="' . $values["id"] . '" class="' . $values["zone_id"] . '">' . $values["tax_taxes_circle"] . '</option>';
            } else {
                echo '<option value="' . $values["id"] . '" class="' . $values["zone_id"] . '">' . $values["tax_taxes_circle"] . '</option>';
            }
        }
        echo '</select>';
    }

    public static function get_address($id) {
        $value = JurisdictionCircle::model()->findByAttributes(array('id' => $id));
        if (empty($value->address)) {
            return null;
        } else {
            return $value->address;
        }
    }

    public static function get_range($id) {
        $value = JurisdictionCircle::model()->findByAttributes(array('id' => $id));
        if (empty($value->ranges)) {
            return null;
        } else {
            return $value->ranges;
        }
    }

}
