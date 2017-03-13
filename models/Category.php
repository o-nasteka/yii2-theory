<?php
/**
 * Created by PhpStorm.
 * User: nasteka
 * Date: 3/11/17
 * Time: 11:52
 */

namespace app\models;


use yii\db\ActiveRecord;

class Category extends ActiveRecord
{
    public static function tableName()
    {
//        Table name
        return 'categories';
    }
}