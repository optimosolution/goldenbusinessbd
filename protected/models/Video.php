<?php

/**
 * This is the model class for table "{{youtube}}".
 *
 * The followings are the available columns in table '{{youtube}}':
 * @property string $id
 * @property string $youtube_id
 * @property integer $published
 * @property string $created_on
 * @property integer $created_by
 * @property integer $featured
 */
class Video extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Video the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{youtube}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('published, created_by, featured', 'numerical', 'integerOnly'=>true),
			array('youtube_id', 'length', 'max'=>100),
			array('created_on', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, youtube_id, published, created_on, created_by, featured', 'safe', 'on'=>'search'),
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
			'youtube_id' => 'Youtube',
			'published' => 'Published',
			'created_on' => 'Created On',
			'created_by' => 'Created By',
			'featured' => 'Featured',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('youtube_id',$this->youtube_id,true);
		$criteria->compare('published',$this->published);
		$criteria->compare('created_on',$this->created_on,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('featured',$this->featured);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}