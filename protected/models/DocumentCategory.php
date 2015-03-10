<?php

/**
 * This is the model class for table "{{document_category}}".
 *
 * The followings are the available columns in table '{{document_category}}':
 * @property integer $id
 * @property string $parent
 * @property string $title
 * @property string $description
 * @property integer $published
 * @property integer $created_by
 * @property string $created_time
 * @property integer $modified_by
 * @property string $modified_time
 */
class DocumentCategory extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return DocumentCategory the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{document_category}}';
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
            array('parent', 'length', 'max' => 11),
            array('title', 'length', 'max' => 255),
            array('created_time, modified_time, description', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, parent, title, description, published, created_by, created_time, modified_by, modified_time', 'safe', 'on' => 'search'),
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
            'parent' => 'Parent',
            'title' => 'Title',
            'description' => 'Description',
            'published' => 'Published',
            'created_by' => 'Created By',
            'created_time' => 'Created Date',
            'modified_by' => 'Modified By',
            'modified_time' => 'Modified Date',
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
        $criteria->compare('parent', $this->parent, true);
        $criteria->compare('title', $this->title, true);
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
     * Retrieves Category name by ID.
     * @return string.
     */
    public static function getCategoryName($id) {
        $returnValue = Yii::app()->db->createCommand()
                ->select('title')
                ->from('{{document_category}}')
                ->where('id=:id', array(':id' => $id))
                ->queryScalar();
        if ($returnValue <= '0') {
            $returnValue = 'No parent!';
        } else {
            $returnValue = $returnValue;
        }
        return $returnValue;
    }
    
    public static function get_category_new($model, $field) {
        $parent1 = Yii::app()->db->createCommand()
                ->select('id,parent,title')
                ->from('{{document_category}}')
                ->where('parent=0 AND published=1')
                ->order('parent,title')
                ->queryAll();
        $option = '<select id="' . $model . '_' . $field . '" name="' . $model . '[' . $field . ']" class="span5">';
        $option .= '<option value="">--please select--</option>';
        foreach ($parent1 as $key => $values1) {
            $option .= '<option value="' . $values1["id"] . '" class="text-primary">&Hopf;' . $values1["title"] . '</option>';
            $parent2 = Yii::app()->db->createCommand()
                    ->select('id,parent,title')
                    ->from('{{document_category}}')
                    ->where('parent=' . $values1["id"] . ' AND published=1')
                    ->order('title')
                    ->queryAll();
            foreach ($parent2 as $key => $values2) {
                $option .= '<option value="' . $values2["id"] . '" class="text-success">&rAarr;' . $values2["title"] . '</option>';
                $parent3 = Yii::app()->db->createCommand()
                        ->select('id,parent,title')
                        ->from('{{document_category}}')
                        ->where('parent=' . $values2["id"] . ' AND published=1')
                        ->order('title')
                        ->queryAll();
                foreach ($parent3 as $key => $values3) {
                    $option .= '<option value="' . $values3["id"] . '" class="text-danger">&DoubleRightArrow;' . $values3["title"] . '</option>';
                    $parent4 = Yii::app()->db->createCommand()
                            ->select('id,parent,title')
                            ->from('{{document_category}}')
                            ->where('parent=' . $values3["id"] . ' AND published=1')
                            ->order('title')
                            ->queryAll();
                    foreach ($parent4 as $key => $values4) {
                        $option .= '<option value="' . $values4["id"] . '" class="text-warning">&srarr;' . $values4["title"] . '</option>';
                    }
                }
            }
        }
        $option .= '</select>';

        return $option;
    }

    public static function get_category_update($model, $field, $id) {
        $parent1 = Yii::app()->db->createCommand()
                ->select('id,parent,title')
                ->from('{{document_category}}')
                ->where('parent=0 AND published=1')
                ->order('parent,title')
                ->queryAll();
        $option = '<select id="' . $model . '_' . $field . '" name="' . $model . '[' . $field . ']" class="span5">';
        $option .= '<option value="">--please select--</option>';
        foreach ($parent1 as $key => $values1) {
            if ($id == $values1["id"]) {
                $option .= '<option selected="selected" value="' . $values1["id"] . '" class="text-primary">&Hopf;' . $values1["title"] . '</option>';
            } else {
                $option .= '<option value="' . $values1["id"] . '" class="text-primary">&Hopf;' . $values1["title"] . '</option>';
            }
            $parent2 = Yii::app()->db->createCommand()
                    ->select('id,parent,title')
                    ->from('{{document_category}}')
                    ->where('parent=' . $values1["id"] . ' AND published=1')
                    ->order('title')
                    ->queryAll();
            foreach ($parent2 as $key => $values2) {
                if ($id == $values2["id"]) {
                    $option .= '<option selected="selected" value="' . $values2["id"] . '" class="text-success">&rAarr;' . $values2["title"] . '</option>';
                } else {
                    $option .= '<option value="' . $values2["id"] . '" class="text-success">&rAarr;' . $values2["title"] . '</option>';
                }
                $parent3 = Yii::app()->db->createCommand()
                        ->select('id,parent,title')
                        ->from('{{document_category}}')
                        ->where('parent=' . $values2["id"] . ' AND published=1')
                        ->order('title')
                        ->queryAll();
                foreach ($parent3 as $key => $values3) {
                    if ($id == $values3["id"]) {
                        $option .= '<option selected="selected" value="' . $values3["id"] . '" class="text-danger">&DoubleRightArrow;' . $values3["title"] . '</option>';
                    } else {
                        $option .= '<option value="' . $values3["id"] . '" class="text-danger">&DoubleRightArrow;' . $values3["title"] . '</option>';
                    }
                    $parent4 = Yii::app()->db->createCommand()
                            ->select('id,parent,title')
                            ->from('{{document_category}}')
                            ->where('parent=' . $values3["id"] . ' AND published=1')
                            ->order('title')
                            ->queryAll();
                    foreach ($parent4 as $key => $values4) {
                        if ($id == $values4["id"]) {
                            $option .= '<option selected="selected" value="' . $values4["id"] . '" class="text-warning">&srarr;' . $values4["title"] . '</option>';
                        } else {
                            $option .= '<option value="' . $values4["id"] . '" class="text-warning">&srarr;' . $values4["title"] . '</option>';
                        }
                    }
                }
            }
        }
        $option .= '</select>';

        return $option;
    }

}