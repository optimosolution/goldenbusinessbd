<?php

// php /home/path/protected/yiic.php cron
class CronCommand extends CConsoleCommand {

    /**
     * Send mail method
     */
    public static function sendMail($email, $subject, $message, $fromName, $fromMail) {
        $adminEmail = 'Optimosolution<' . $fromMail . '>';
        $headers = "MIME-Version: 1.0\r\nFrom: $adminEmail\r\nReply-To: $adminEmail\r\nContent-Type: text/html; charset=utf-8";
        $message = wordwrap($message, 70);
        $message = str_replace("\n.", "\n..", $message);
        return mail($email, '=?UTF-8?B?' . base64_encode($subject) . '?=', $message, $headers);
    }

    public function get_subscriber_name($id) {
        $value = Yii::app()->db->createCommand()
                ->select('name')
                ->from('{{user}}')
                ->where('id=' . $id)
                ->queryScalar();
        return $value;
    }

    public function get_subscriber_email($id) {
        $value = Yii::app()->db->createCommand()
                ->select('email')
                ->from('{{user}}')
                ->where('id=' . $id)
                ->queryScalar();
        return $value;
    }

    public function actionIndex() {
        $subject = 'Test mail';
        $fromNames = Yii::app()->params['adminName'];
        $fromMails = Yii::app()->params['adminEmail'];
        $to_name = $this->get_subscriber_name($id);
        $to_mail = $this->get_subscriber_email($id);
        $recipients = "{$to_name}<{$to_mail}>";
        $this->sendMail($recipients, $subject, $body, $fromNames, $fromMails);
    }

}