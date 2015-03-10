<?php

/**
 * This is the model class for table "{{currency}}".
 *
 * The followings are the available columns in table '{{currency}}':
 * @property integer $id
 * @property string $currency_name
 * @property string $currency_code_2
 * @property string $currency_code_3
 * @property integer $currency_numeric_code
 * @property string $currency_exchange_rate
 * @property string $currency_symbol
 * @property string $currency_decimal_place
 * @property string $currency_decimal_symbol
 * @property string $currency_thousands
 * @property integer $ordering
 * @property integer $published
 * @property string $created_on
 * @property integer $created_by
 * @property string $modified_on
 * @property integer $modified_by
 * @property string $locked_on
 * @property integer $locked_by
 */
class Currency extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Currency the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{currency}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('currency_name, currency_symbol, published', 'required'),
            array('currency_numeric_code, ordering, published, created_by, modified_by, locked_by', 'numerical', 'integerOnly' => true),
            array('currency_name', 'length', 'max' => 64),
            array('currency_code_2', 'length', 'max' => 2),
            array('currency_code_3', 'length', 'max' => 3),
            array('currency_exchange_rate', 'length', 'max' => 10),
            array('currency_symbol, currency_decimal_place, currency_decimal_symbol, currency_thousands', 'length', 'max' => 4),
            array('created_on, modified_on, locked_on', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, currency_name, currency_code_2, currency_code_3, currency_numeric_code, currency_exchange_rate, currency_symbol, currency_decimal_place, currency_decimal_symbol, currency_thousands, ordering, published, created_on, created_by, modified_on, modified_by, locked_on, locked_by', 'safe', 'on' => 'search'),
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
            'currency_name' => 'Currency Name',
            'currency_code_2' => 'Currency Code 2',
            'currency_code_3' => 'Currency Code 3',
            'currency_numeric_code' => 'Currency Numeric Code',
            'currency_exchange_rate' => 'Currency Exchange Rate',
            'currency_symbol' => 'Currency Symbol',
            'currency_decimal_place' => 'Currency Decimal Place',
            'currency_decimal_symbol' => 'Currency Decimal Symbol',
            'currency_thousands' => 'Currency Thousands',
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
        $criteria->compare('currency_name', $this->currency_name, true);
        $criteria->compare('currency_code_2', $this->currency_code_2, true);
        $criteria->compare('currency_code_3', $this->currency_code_3, true);
        $criteria->compare('currency_numeric_code', $this->currency_numeric_code);
        $criteria->compare('currency_exchange_rate', $this->currency_exchange_rate, true);
        $criteria->compare('currency_symbol', $this->currency_symbol, true);
        $criteria->compare('currency_decimal_place', $this->currency_decimal_place, true);
        $criteria->compare('currency_decimal_symbol', $this->currency_decimal_symbol, true);
        $criteria->compare('currency_thousands', $this->currency_thousands, true);
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

}