<?php

/**
 * This is the model class for table "{{exam}}".
 *
 * The followings are the available columns in table '{{exam}}':
 * @property integer $id
 * @property integer $user
 * @property integer $question
 * @property integer $answer
 * @property integer $correct
 */
class Exam extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{exam}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user, question, answer, correct', 'required'),
            array('user, category, question, answer, correct', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, user, category, question, answer, correct', 'safe', 'on' => 'search'),
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
            'user' => 'User',
            'category' => 'Category',
            'question' => 'Question',
            'answer' => 'Answer',
            'correct' => 'Correct',
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
        $criteria->compare('user', $this->user);
        $criteria->compare('category', $this->category);
        $criteria->compare('question', $this->question);
        $criteria->compare('answer', $this->answer);
        $criteria->compare('correct', $this->correct);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Exam the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function getData($id, $field) {
        $value = Exam::model()->findByPk($id);
        if (empty($value->$field)) {
            return null;
        } else {
            return $value->$field;
        }
    }

    public static function getTotalAnswer($id) {
        $value = Exam::model()->findAll(array('condition' => 'category=' . (int) $id));
        return count($value);
    }

    public static function getTotalCorrect($id) {
        $value = Exam::model()->findAll(array('condition' => 'category=' . (int) $id . ' AND answer=correct'));
        return count($value);
    }

    public static function getTotalIncorrect($id) {
        $value = Exam::model()->findAll(array('condition' => 'category=' . (int) $id . ' AND answer!=correct'));
        return count($value);
    }

}
