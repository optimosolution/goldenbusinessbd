<?php

/**
 * This is the model class for table "{{weblink_category}}".
 *
 * The followings are the available columns in table '{{weblink_category}}':
 * @property integer $id
 * @property string $parent_id
 * @property string $title
 * @property string $alias
 * @property string $description
 * @property integer $published
 * @property integer $created_by
 * @property string $created_time
 * @property integer $modified_by
 * @property string $modified_time
 */
class WeblinkCategory extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return WeblinkCategory the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{weblink_category}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title', 'required'),
            array('published, created_by, modified_by', 'numerical', 'integerOnly' => true),
            array('parent_id', 'length', 'max' => 11),
            array('title, alias', 'length', 'max' => 255),
            array('created_time, modified_time', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, parent_id, title, alias, description, published, created_by, created_time, modified_by, modified_time', 'safe', 'on' => 'search'),
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
            'parent_id' => 'Parent',
            'title' => 'Title',
            'alias' => 'Alias',
            'description' => 'Description',
            'published' => 'Published',
            'created_by' => 'Created By',
            'created_time' => 'Created Time',
            'modified_by' => 'Modified By',
            'modified_time' => 'Modified Time',
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
        $criteria->compare('parent_id', $this->parent_id, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('alias', $this->alias, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('published', $this->published);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('created_time', $this->created_time, true);
        $criteria->compare('modified_by', $this->modified_by);
        $criteria->compare('modified_time', $this->modified_time, true);

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
            $returnValue = 'No parent!';
        } else {
            $returnValue = $returnValue;
        }
        return $returnValue;
    }

    public static function get_category($id) {
        $value = WeblinkCategory::model()->findByAttributes(array('id' => $id));
        if (empty($value->title)) {
            return null;
        } else {
            return $value->title;
        }
    }

}
