<?php
/**
 * Created by PhpStorm.
 * User: nasteka
 * Date: 3/10/17
 * Time: 17:03
 */

namespace app\models;

use yii\base\Model;


class TestForm extends Model{

    public $name;
    public $email;
    public $text;

    public function attributeLabels()
    {
        return [
            'name' => 'Ваше имя',
            'email' => 'Email',
            'text' => 'Введите текст',
        ];
    }

    public function rules()
    {
        return [
          [ [ 'name', 'email'], 'required' ],
//          [ ['name', 'email'], 'required', 'message' => 'Обязательное поле']
            [ 'email', 'email' ],
//            ['name', 'string','min' => 2, 'tooShort' => 'Слишком короткое имя'],
//            ['name', 'string','max' => 25, 'tooLong' => 'Слишком длинное имя'],
            [ 'name', 'string', 'length' => [2,5] ],
            [ 'name', 'myRule' ],
        ];
    }

    public function myRule($attr){


    }

}