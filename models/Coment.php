<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 19.10.2016
 * Time: 11:25
 */

namespace app\models;


use yii\db\ActiveRecord;

class Coment extends ActiveRecord
{
    public function rules()
    {
        return [
            [['name', 'coment'], 'required']
        ];
    }
}