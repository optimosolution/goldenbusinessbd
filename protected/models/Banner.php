<?php

/**
 * This is the model class for table "{{banner}}".
 *
 * The followings are the available columns in table '{{banner}}':
 * @property string $id
 * @property string $catid
 * @property string $name
 * @property string $alias
 * @property string $banner
 * @property string $clickurl
 * @property string $description
 * @property integer $published
 * @property integer $sticky
 * @property integer $ordering
 * @property string $created_on
 * @property integer $created_by
 * @property string $publish_up
 * @property string $publish_down
 */
class Banner extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Banner the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{banner}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('catid,name, published', 'required'),
            array('published, sticky, ordering, created_by', 'numerical', 'integerOnly' => true),
            array('catid', 'length', 'max' => 10),
            array('name, alias', 'length', 'max' => 255),
            array('clickurl', 'length', 'max' => 200),
            array('banner, description, created_on, publish_up, publish_down', 'safe'),
            array('banner', 'file', 'types' => 'jpg,jpeg,gif,png', 'allowEmpty' => true, 'minSize' => 2, 'maxSize' => 1024 * 1024 * 5, 'tooLarge' => 'The file was larger than 5MB. Please upload a smaller file.', 'wrongType' => 'File format was not supported.', 'tooSmall' => 'File size was too small or empty.'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, catid, name, alias, banner, clickurl, description, published, sticky, ordering, created_on, created_by, publish_up, publish_down', 'safe', 'on' => 'search'),
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
            'catid' => 'Category',
            'name' => 'Name',
            'alias' => 'Alias',
            'banner' => 'Banner',
            'clickurl' => 'URL',
            'description' => 'Description',
            'published' => 'Published',
            'sticky' => 'Sticky',
            'ordering' => 'Ordering',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
            'publish_up' => 'Publish Up',
            'publish_down' => 'Publish Down',
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
        $criteria->compare('catid', $this->catid, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('alias', $this->alias, true);
        $criteria->compare('banner', $this->banner);
        $criteria->compare('clickurl', $this->clickurl, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('published', $this->published);
        $criteria->compare('sticky', $this->sticky);
        $criteria->compare('ordering', $this->ordering);
        $criteria->compare('created_on', $this->created_on, true);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('publish_up', $this->publish_up, true);
        $criteria->compare('publish_down', $this->publish_down, true);

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
    public static function getUserName($id) {
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
    public static function getCategoryName($id) {
        $returnValue = Yii::app()->db->createCommand()
                ->select('title')
                ->from('{{banner_category}}')
                ->where('id=:id', array(':id' => $id))
                ->queryScalar();
        if ($returnValue <= '0') {
            $returnValue = 'No parent!';
        } else {
            $returnValue = $returnValue;
        }
        return $returnValue;
    }

}