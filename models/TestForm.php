<?php
/**
 * Created by PhpStorm.
 * User: nasteka
 * Date: 3/10/17
 * Time: 17:03
 */

namespace app\models;

use yii\db\ActiveRecord;


class TestForm extends ActiveRecord{

//    Свойства необходимы при использовании extends Models
//    При использовании ActiveRecords - создаются автоматом
//    сулужебными запросами yii (согласно полям таблицы)
//    public $name;
//    public $email;
//    public $text;

//  Имя используемой таблицы,
//  если имя класса отличается от имени таблицы
    public static function tableName()
    {
//        Table name
        return 'posts';
    }

//    Собственное название Labels формы
    public function attributeLabels()
    {
        return [
            'name' => 'Ваше имя',
            'email' => 'Email',
            'text' => 'Введите текст',
        ];
    }

//    Правила валидации формы
    public function rules()
    {
        return [
          [ [ 'name', 'text'], 'required' ],
//            [ 'email', 'email' ],
            [ 'text', 'trim' ],
        ];
    }


}