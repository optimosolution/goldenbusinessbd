<?php

/**
 * This is the model class for table "{{massmail}}".
 *
 * The followings are the available columns in table '{{massmail}}':
 * @property string $id
 * @property integer $user_group
 * @property integer $user_status
 * @property string $subject
 * @property string $message_body
 * @property integer $created_by
 * @property string $created_on
 * @property integer $modified_by
 * @property string $modified_on
 * @property integer $send_by
 * @property string $send_on
 */
class Massmail extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Massmail the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{massmail}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('subject, message_body, created_on', 'required'),
            array('user_group, user_status, created_by, modified_by, send_by', 'numerical', 'integerOnly' => true),
            array('subject', 'length', 'max' => 250),
            array('modified_on, send_on, created_by', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, user_group, user_status, subject, message_body, created_by, created_on, modified_by, modified_on, send_by, send_on', 'safe', 'on' => 'search'),
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
            'user_group' => 'User Group',
            'user_status' => 'User Status',
            'subject' => 'Subject',
            'message_body' => 'Message Body',
            'created_by' => 'Created By',
            'created_on' => 'Created On',
            'modified_by' => 'Modified By',
            'modified_on' => 'Modified On',
            'send_by' => 'Send By',
            'send_on' => 'Send On',
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
        $criteria->alias = 't';

        $criteria->compare('t.id', $this->id, true);
        $criteria->compare('t.user_group', $this->user_group);
        $criteria->compare('t.user_status', $this->user_status);
        $criteria->compare('t.subject', $this->subject, true);
        $criteria->compare('t.message_body', $this->message_body, true);
        $criteria->compare('t.created_by', $this->created_by);
        $criteria->compare('t.created_on', $this->created_on, true);
        $criteria->compare('t.modified_by', $this->modified_by);
        $criteria->compare('t.modified_on', $this->modified_on, true);
        $criteria->compare('t.send_by', $this->send_by);
        $criteria->compare('t.send_on', $this->send_on, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'sort' => array('defaultOrder' => 't.created_on DESC'),
            'pagination' => array(
                'pageSize' => Yii::app()->params['pageSize'],
            ),
        ));
    }

    /**
     * Send mail method
     */
    public static function sendMail($to, $subject, $message, $fromName, $fromMail, $bccList) {
        //$headers = "MIME-Version: 1.0\r\nFrom: " . $fromName . "<" . $fromMail . "> \r\nReply-To: " . $fromMail . "\r\nContent-Type: text/html; charset=utf-8";
        $headers = "From: " . $fromName . "<" . $fromMail . "> \r\nX-Mailer: php\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
        $headers .= "Bcc: $bccList\r\n";
        $to = $fromMail;
        $message = wordwrap($message, 70);
        $message = str_replace("\n.", "\n..", $message);
        return mail($to, '=?UTF-8?B?' . base64_encode($subject) . '?=', $message, $headers);
    }

    public static function get_mail_send($id) {
        $link = CHtml::link('<span class="label label-large label-pink arrowed-right">Send</span>', array('massmail/send', 'id' => $id), array('data-rel' => 'tooltip', 'title' => 'Send mail!', 'data-placement' => 'top'));
        return $link;
    }

}