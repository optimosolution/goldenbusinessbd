<?php

/**
 * This is the model class for table "{{jurisdiction_employer}}".
 *
 * The followings are the available columns in table '{{jurisdiction_employer}}':
 * @property integer $id
 * @property string $tax_employer
 * @property integer $tax_area
 * @property integer $character_id
 */
class JurisdictionEmployer extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{jurisdiction_employer}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tax_employer, tax_area, character_id', 'required'),
			array('tax_area, character_id', 'numerical', 'integerOnly'=>true),
			array('tax_employer', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, tax_employer, tax_area, character_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'tax_employer' => 'Employer',
			'tax_area' => 'District',
			'character_id' => 'Character',
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
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('tax_employer',$this->tax_employer,true);
		$criteria->compare('tax_area',$this->tax_area);
		$criteria->compare('character_id',$this->character_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return JurisdictionEmployer the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
