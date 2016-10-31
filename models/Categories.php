<?php
/**
 * Created by PhpStorm.
 * User: student
 * Date: 31.10.2016
 * Time: 9:39
 */

namespace app\models;


use yii\db\ActiveRecord;

class Categories extends ActiveRecord
{
    public function relations(){
        return array(
          'categories'=>array(self::HAS_ONE,'categories')
        );
    }
}