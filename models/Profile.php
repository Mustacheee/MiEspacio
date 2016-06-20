<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 6/19/2016
 * Time: 3:16 PM
 */

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

class Profile extends ActiveRecord
{
    /**
     * @package app\models
     *
     * @property integer $id
     * @property string $aboutme
     */


    /**
     * @return string
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @return array
     */
    public function rules()
    {
        $rules = [
            [['aboutme'], 'required'],
            [['aboutme'], 'string'],
            
        ];

        return $rules;
    }

    /**
     * @return array
     */
    public function attributeLabels()
    {
        return [
            'aboutme' => 'About Me',
        ];
    }

    /**
     * @param $data
     * @return bool
     */
    public function createProfile($data)
    {
        if($this->load($data)){
            if($this->save())
                return true;
        }
    }
}