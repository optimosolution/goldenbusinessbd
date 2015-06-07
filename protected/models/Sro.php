<?php

/**
 * This is the model class for table "{{sro}}".
 *
 * The followings are the available columns in table '{{sro}}':
 * @property integer $id
 * @property integer $sro_type
 * @property integer $sl_no
 * @property string $sro_no
 * @property string $sro_date
 * @property string $summary
 * @property string $description
 * @property string $note
 * @property string $attach_file
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property SroType $sroType
 * @property SroStatus $status0
 */
class Sro extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{sro}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('sro_type, sl_no, sro_no, sro_date, status', 'required'),
            array('sro_type, sl_no, status', 'numerical', 'integerOnly' => true),
            array('sro_no, summary, attach_file', 'length', 'max' => 250),
            array('description, note', 'safe'),
            array('attach_file', 'file', 'types' => 'jpg,jpeg,gif,png,txt,pdf,doc,docx,xls,xlsx,ppt,pptx,odt', 'allowEmpty' => true, 'minSize' => 2, 'maxSize' => 1024 * 1024 * 50, 'tooLarge' => 'The file was larger than 50MB. Please upload a smaller file.', 'wrongType' => 'File format was not supported.', 'tooSmall' => 'File size was too small or empty.'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, sro_type, sl_no, sro_no, sro_date, summary, description, note, attach_file, status', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'sroType' => array(self::BELONGS_TO, 'SroType', 'sro_type'),
            'status0' => array(self::BELONGS_TO, 'SroStatus', 'status'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'sro_type' => 'Type',
            'sl_no' => 'SL',
            'sro_no' => 'SRO No',
            'sro_date' => 'Date',
            'summary' => 'Summary',
            'description' => 'Description',
            'note' => 'Note',
            'attach_file' => 'Attach File',
            'status' => 'Status',
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
        $criteria->compare('sro_type', $this->sro_type);
        $criteria->compare('sl_no', $this->sl_no);
        $criteria->compare('sro_no', $this->sro_no, true);
        $criteria->compare('sro_date', $this->sro_date, true);
        $criteria->compare('summary', $this->summary, true);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('note', $this->note, true);
        $criteria->compare('attach_file', $this->attach_file, true);
        $criteria->compare('status', $this->status);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function search_sro($id) {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;
        $criteria->alias = 't';
        $criteria->condition = 't.sro_type=' . (int) $id;

        $criteria->compare('t.id', $this->id);
        $criteria->compare('t.sro_type', $this->sro_type);
        $criteria->compare('t.sl_no', $this->sl_no);
        $criteria->compare('t.sro_no', $this->sro_no, true);
        $criteria->compare('t.sro_date', $this->sro_date, true);
        $criteria->compare('t.summary', $this->summary, true);
        $criteria->compare('t.description', $this->description, true);
        $criteria->compare('t.note', $this->note, true);
        $criteria->compare('t.attach_file', $this->attach_file, true);
        $criteria->compare('t.status', $this->status);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize20'],
            ),
            'sort' => array('defaultOrder' => 't.sro_date DESC')
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Sro the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
