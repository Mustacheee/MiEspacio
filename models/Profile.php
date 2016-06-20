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


    public static function tableName()
    {
        return 'profile';
    }
    
    public function rules()
    {
        $rules = [
            [['aboutme'], 'required'],
            [['aboutme'], 'string'],
            
        ];

        return $rules;
    }
    
    public function createProfile()
    {
        
    }
} 