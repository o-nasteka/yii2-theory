<?php
/**
 * Created by PhpStorm.
 * User: nasteka
 * Date: 3/6/17
 * Time: 17:22
 */

namespace app\controllers\admin;

use app\controllers\AppController;

class UserController extends AppController{

    public function actionIndex(){
        return $this->render('index');

//        return 'Admin Index';
    }
}