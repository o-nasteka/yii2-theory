<?php
/**
 * Created by PhpStorm.
 * User: nasteka
 * Date: 3/6/17
 * Time: 20:41
 */

namespace app\controllers;

use yii\web\controller;

class AppController extends Controller  {

    public function debug($arr){
        echo '<pre>' . print_r($arr, true) . '</pre>';
    }

}

