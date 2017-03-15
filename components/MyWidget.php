<?php
/**
 * Created by PhpStorm.
 * User: nasteka
 * Date: 3/14/17
 * Time: 15:32
 */

namespace app\components;
use yii\base\Widget;


class MyWidget extends Widget
{
    // свойство, доп. параметр
    public $name;

//    Инициализация виджета
    public function init()
    {
        parent::init(); // обязательная инициализация родительского метода

        // если параметр не был передан, устанавливаем значение по умолчанию
        // if ( $this->name === null ) $this->name = 'Гость';

//      Включение буферизации вывода
        ob_start();


    }

    public function run()
    {
        // использование доп.параметра $name и рендер вида my
//        return $this->render('my', ['name' => $this->name]);

//      Получить содержимое текущего буфера и удалить его
        $content = ob_get_clean();
        $content = mb_strtoupper($content);
//        рендер вида my
        return $this->render('my', compact('content'));
    }

}