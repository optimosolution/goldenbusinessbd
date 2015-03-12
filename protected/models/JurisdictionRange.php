<?php

/**
 * This is the model class for table "{{jurisdiction_range}}".
 *
 * The followings are the available columns in table '{{jurisdiction_range}}':
 * @property integer $id
 * @property integer $zone
 * @property string $title
 *
 * The followings are the available model relations:
 * @property JurisdictionZone $zone0
 */
class JurisdictionRange extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{jurisdiction_range}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('zone, title', 'required'),
            array('zone', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 250),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, zone, title', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'zone0' => array(self::BELONGS_TO, 'JurisdictionZone', 'zone'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'zone' => 'Zone',
            'title' => 'Range',
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
        $criteria->compare('zone', $this->zone);
        $criteria->compare('title', $this->title, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return JurisdictionRange the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function get_title($id) {
        $value = JurisdictionRange::model()->findByAttributes(array('id' => $id));
        if (empty($value->title)) {
            return null;
        } else {
            return $value->title;
        }
    }
    
    public static function get_range_list($controller, $field, $id) {
        $rValue = Yii::app()->db->createCommand()
                ->select('id,zone,title')
                ->from('{{jurisdiction_range}}')
                ->order('title')
                ->queryAll();
        echo '<select id="' . $controller . '_' . $field . '" name="' . $controller . '[' . $field . ']" class="span12">';
        echo '<option value="">--select range--</option>';
        foreach ($rValue as $key => $values) {
            if ($values["id"] == $id) {
                echo '<option selected="selected" value="' . $values["id"] . '" class="' . $values["zone"] . '">' . $values["title"] . '</option>';
            } else {
                echo '<option value="' . $values["id"] . '" class="' . $values["zone"] . '">' . $values["title"] . '</option>';
            }
        }
        echo '</select>';
    }

}
