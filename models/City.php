<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 24.10.2016
 * Time: 9:48
 */

namespace app\models;


use yii\db\ActiveRecord;

class City extends ActiveRecord
{
    public function rules()
    {
        return [
            ['name', 'required']
        ];
    }
}