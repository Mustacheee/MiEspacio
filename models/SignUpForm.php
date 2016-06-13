<?php

namespace app\models;

use app\models\User;
use Yii;
use yii\base\Model;

/**
 * ContactForm is the model behind the contact form.
 */
class SignUpForm extends Model
{
    public $first_name;
    public $last_name;
    public $email;
    public $verifyCode;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
//            // name, email, subject and body are required
//            [['name', 'email', 'subject', 'body'], 'required'],
//            // email has to be a valid email address
//            ['email', 'email'],
//            // verifyCode needs to be entered correctly
//            ['verifyCode', 'captcha'],
            //[['first_name', 'last_name', 'email'], 'required'],
            //[['email'],'email'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'first_name' => 'First Name',
            'verifyCode' => 'Verification Code',
        ];
    }

    /**
     * Sends an email to the specified email address using the information collected by this model.
     * @param string $email the target email address
     * @return boolean whether the model passes validation
     */
    public function contact($email)
    {
        if ($this->validate()) {
            Yii::$app->mailer->compose()
                ->setTo($email)
                ->setFrom([$this->email => $this->name])
                ->setSubject($this->subject)
                ->setTextBody($this->body)
                ->send();

            return true;
        }
        return false;
    }
    
}
