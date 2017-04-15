<?php

/**
 * This is the model class for table "{{exam_answer}}".
 *
 * The followings are the available columns in table '{{exam_answer}}':
 * @property integer $id
 * @property integer $question
 * @property string $answer
 * @property integer $correct
 * @property integer $published
 */
class ExamAnswer extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{exam_answer}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('question, answer', 'required'),
            array('question, correct, published', 'numerical', 'integerOnly' => true),
            array('answer', 'length', 'max' => 400),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, question, answer, correct, published', 'safe', 'on' => 'search'),
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
            'question' => 'Question',
            'answer' => 'Answer',
            'correct' => 'Correct',
            'published' => 'Published',
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
    public function search($id) {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;
        $criteria->condition = 'question=' . (int) $id;

        $criteria->compare('id', $this->id);
        //$criteria->compare('question', $this->question);
        $criteria->compare('answer', $this->answer, true);
        $criteria->compare('correct', $this->correct);
        $criteria->compare('published', $this->published);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ExamAnswer the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function getCorrect($id) {
        $model = ExamAnswer::model()->find(array('condition' => 'question=' . (int) $id . ' AND correct=1'));
        return $model->id;
    }

    public static function getData($id, $field) {
        //$value = ExamAnswer::model()->findByPk($id);
        $value = ExamAnswer::model()->findByAttributes(array('id' => $id));
        if (empty($value->$field)) {
            return null;
        } else {
            return $value->$field;
        }
    }

}
