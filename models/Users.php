<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 24.10.2016
 * Time: 10:15
 */

namespace app\models;


use yii\db\ActiveRecord;

class Users extends ActiveRecord
{
    public function rules()
    {
        return [
            [['name', 'email', 'password','phone','city'], 'required'],
            ['email','email']
//            ['password','password']
        ];
    }
}