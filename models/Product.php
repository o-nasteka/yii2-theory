<?php
/**
 * Created by PhpStorm.
 * User: nasteka
 * Date: 3/14/17
 * Time: 10:32
 */

namespace app\models;


use yii\db\ActiveRecord;

class Product extends ActiveRecord
{

    public static function tableName()
    {
//        Table name
        return 'products';
    }

    public function getCategories(){
        return $this->hasOne(Category::className(), ['id' => 'parent']);
    }

}