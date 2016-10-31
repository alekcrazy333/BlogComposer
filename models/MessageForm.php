<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 19.10.2016
 * Time: 9:31
 */

namespace app\models;

use Yii;
use yii\base\Model;

class MessageForm extends Model
{
    public $name;
    public $emailFrom;
    public $emailTo;
    public $subject;
    public $message;
    public $file;

    public function rules()
    {
        return [
            [['name', 'emailFrom', 'emailTo', 'subject', 'message'], 'required', 'message'=>'fill it'],
            [['emailFrom', 'emailTo'], 'email'],
            ['file', 'file']
        ];
    }

    public function sendEmail()
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($this->emailTo)
                ->setFrom([$this->emailFrom => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->message)
                ->attach($this->file)
                ->send();

            return true;
        }
        return false;
    }

}