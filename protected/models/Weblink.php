<?php

/**
 * This is the model class for table "{{weblink}}".
 *
 * The followings are the available columns in table '{{weblink}}':
 * @property string $id
 * @property integer $category_id
 * @property string $title
 * @property string $description
 * @property string $click_url
 * @property string $created_on
 * @property integer $created_by
 * @property integer $hits
 * @property integer $published
 */
class Weblink extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Weblink the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{weblink}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('category_id, title, click_url', 'required'),
            array('category_id, created_by, hits, published', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 255),
            array('click_url', 'length', 'max' => 250),
            array('description, created_on', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, category_id, title, description, click_url, created_on, created_by, hits, published', 'safe', 'on' => 'search'),
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
            'category_id' => 'Category',
            'title' => 'Title',
            'description' => 'Description',
            'click_url' => 'Click Url',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
            'hits' => 'Hits',
            'published' => 'Published',
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

        $criteria->compare('id', $this->id, true);
        $criteria->compare('category_id', $this->category_id);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('click_url', $this->click_url, true);
        $criteria->compare('created_on', $this->created_on, true);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('hits', $this->hits);
        $criteria->compare('published', $this->published);

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

    /**
     * Retrieves Category name by ID.
     * @return string.
     */
    public function getCategoryName($id) {
        $returnValue = Yii::app()->db->createCommand()
                ->select('title')
                ->from('{{weblink_category}}')
                ->where('id=:id', array(':id' => $id))
                ->queryScalar();
        if ($returnValue <= '0') {
            $returnValue = 'No Set!';
        } else {
            $returnValue = $returnValue;
        }
        return $returnValue;
    }

}
