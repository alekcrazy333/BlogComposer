<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 26.10.2016
 * Time: 10:48
 */

namespace app\models;


use yii\db\ActiveRecord;

class Blog extends ActiveRecord
{

    public function getCategories(){
        return self::hasOne(Categories::className(),['id'=>'category_id']);
    }

    public function rules()
    {
        return [
            [['title', 'content', 'user_id','category_id', 'created_at','updated_at'], 'required']
        ];
    }
}