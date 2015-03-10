<?php

/**
 * This is the model class for table "{{directory_category}}".
 *
 * The followings are the available columns in table '{{directory_category}}':
 * @property string $id
 * @property integer $parent
 * @property string $title
 * @property string $details
 * @property integer $created_by
 * @property string $created_on
 * @property integer $published
 */
class DirectoryCategory extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return DirectoryCategory the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{directory_category}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, created_on', 'required'),
            array('parent, created_by, published', 'numerical', 'integerOnly' => true),
            array('title', 'length', 'max' => 250),
            array('details', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, parent, title, details, created_by, created_on, published', 'safe', 'on' => 'search'),
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
            'details' => 'Details',
            'created_by' => 'Created By',
            'created_on' => 'Created On',
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
        $criteria->compare('parent', $this->parent);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('details', $this->details, true);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('created_on', $this->created_on, true);
        $criteria->compare('published', $this->published);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            ),
        ));
    }

    public static function getDirectoryCategory($id) {
        $value = DirectoryCategory::model()->findByAttributes(array('id' => $id));
        if (empty($value->title)) {
            return 'Root';
        } else {
            return $value->title;
        }
    }

    public static function get_category_new($model, $field) {
        $parent1 = Yii::app()->db->createCommand()
                ->select('id,parent,title')
                ->from('{{directory_category}}')
                ->where('parent=0 AND published=1 OR parent IS NULL')
                ->order('parent,title')
                ->queryAll();
        $option = '<select id="' . $model . '_' . $field . '" name="' . $model . '[' . $field . ']" class="span5">';
        $option .= '<option value="">--please select--</option>';
        foreach ($parent1 as $key => $values1) {
            $option .= '<option value="' . $values1["id"] . '" class="text-primary icon-home"> ' . $values1["title"] . '</option>';
            $parent2 = Yii::app()->db->createCommand()
                    ->select('id,parent,title')
                    ->from('{{directory_category}}')
                    ->where('parent=' . $values1["id"] . ' AND published=1')
                    ->order('title')
                    ->queryAll();
            foreach ($parent2 as $key => $values2) {
                $option .= '<option value="' . $values2["id"] . '" class="text-success">&rAarr;' . $values2["title"] . '</option>';
                $parent3 = Yii::app()->db->createCommand()
                        ->select('id,parent,title')
                        ->from('{{directory_category}}')
                        ->where('parent=' . $values2["id"] . ' AND published=1')
                        ->order('title')
                        ->queryAll();
                foreach ($parent3 as $key => $values3) {
                    $option .= '<option value="' . $values3["id"] . '" class="text-danger">&DoubleRightArrow;' . $values3["title"] . '</option>';
                    $parent4 = Yii::app()->db->createCommand()
                            ->select('id,parent,title')
                            ->from('{{directory_category}}')
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
                ->from('{{directory_category}}')
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
                    ->from('{{directory_category}}')
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
                        ->from('{{directory_category}}')
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
                            ->from('{{directory_category}}')
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