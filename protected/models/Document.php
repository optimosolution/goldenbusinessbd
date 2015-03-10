<?php

/**
 * This is the model class for table "{{document}}".
 *
 * The followings are the available columns in table '{{document}}':
 * @property integer $id
 * @property integer $catid
 * @property string $title
 * @property string $doc_file
 * @property string $doc_type
 * @property string $doc_size
 * @property string $summary
 * @property string $created_on
 * @property integer $created_by
 * @property string $modified_on
 * @property integer $modified_by
 */
class Document extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Document the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{document}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title', 'required'),
            array('catid, created_by, modified_by', 'numerical', 'integerOnly' => true),
            array('title, doc_file', 'length', 'max' => 255),
            array('doc_type, doc_size', 'length', 'max' => 50),
            array('summary, created_on, modified_on,published', 'safe'),
            array('doc_file', 'file', 'types' => 'jpg,jpeg,gif,png,pdf,doc,docx,odt,rtf,tex,txt,ppt,pptx,txt,xlsx,xls,csv,zip,rar,7z,bzip2,gzip,tar,aif,iff,m3u,m4a,mid,mp3,mpa,ra,wav,wma,3g2,3gp,asf,asx,avi,flv,mov,mp4,mpg,rm,srt,swf,vob,wmv', 'allowEmpty' => true, 'minSize' => 2, 'maxSize' => 1024 * 1024 * 50, 'tooLarge' => 'The file was larger than 50MB. Please upload a smaller file.', 'wrongType' => 'File format was not supported.', 'tooSmall' => 'File size was too small or empty.'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, catid, title, doc_file, doc_type, doc_size, summary, created_on, created_by, modified_on, modified_by, published', 'safe', 'on' => 'search'),
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
            'title' => 'Title',
            'doc_file' => 'File',
            'doc_type' => 'Type',
            'doc_size' => 'Size',
            'summary' => 'Summary',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
            'modified_on' => 'Modified On',
            'modified_by' => 'Modified By',
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

        $criteria->compare('id', $this->id);
        $criteria->compare('catid', $this->catid);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('doc_file', $this->doc_file, true);
        $criteria->compare('doc_type', $this->doc_type, true);
        $criteria->compare('doc_size', $this->doc_size, true);
        $criteria->compare('summary', $this->summary, true);
        $criteria->compare('created_on', $this->created_on, true);
        $criteria->compare('created_by', $this->created_by);
        $criteria->compare('modified_on', $this->modified_on, true);
        $criteria->compare('modified_by', $this->modified_by);
        $criteria->compare('published', $this->published);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            ),
        ));
    }

    public static function byteToMbyte($a_bytes) {
        if ($a_bytes < 1024) {
            return $a_bytes . ' B';
        } elseif ($a_bytes < 1048576) {
            return round($a_bytes / 1024, 2) . ' KiB';
        } elseif ($a_bytes < 1073741824) {
            return round($a_bytes / 1048576, 2) . ' MiB';
        } elseif ($a_bytes < 1099511627776) {
            return round($a_bytes / 1073741824, 2) . ' GiB';
        } elseif ($a_bytes < 1125899906842624) {
            return round($a_bytes / 1099511627776, 2) . ' TiB';
        } elseif ($a_bytes < 1152921504606846976) {
            return round($a_bytes / 1125899906842624, 2) . ' PiB';
        } elseif ($a_bytes < 1180591620717411303424) {
            return round($a_bytes / 1152921504606846976, 2) . ' EiB';
        } elseif ($a_bytes < 1208925819614629174706176) {
            return round($a_bytes / 1180591620717411303424, 2) . ' ZiB';
        } else {
            return round($a_bytes / 1208925819614629174706176, 2) . ' YiB';
        }
    }

    public static function getCategoryID($id) {
        $returnValue = Yii::app()->db->createCommand()
                ->select('catid')
                ->from('{{document}}')
                ->where('id=:id', array(':id' => $id))
                ->queryScalar();
        return $returnValue;
    }

}
