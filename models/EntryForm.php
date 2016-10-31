<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 19.10.2016
 * Time: 9:31
 */

namespace app\models;


use yii\base\Model;

class EntryForm extends Model
{
    public $name;
    public $email;
    public $inn;



    public function rules()
    {
        return [
            [['name', 'email'], 'required', 'message'=>'fill it'],
            ['email', 'email'],
            ['inn', 'validInn'],
            ['edrpou', 'validInn'],
        ];
    }

    public function validInn($attributes) {
        $this->$attributes;
    }

}