<?php
/**
 * Created by PhpStorm.
 * User: nasteka
 * Date: 3/6/17
 * Time: 20:48
 */

namespace app\controllers;

use Yii;
use app\models\TestForm;

class PostController extends AppController{

    public $layout = 'basic';

    public function beforeAction($action)
    {
//        debug($action);
        if( $action->id == 'index'){
            $this->enableCsrfValidation = false;
        }
        return parent::beforeAction($action);
    }

    public function actionIndex()
    {
        $this->view->title = 'Все статьи';
        if( Yii::$app->request->isAjax ){
//            debug($_POST);
            debug(Yii::$app->request->post());
            return 'test';
        }

        $model = new TestForm();

        if ( $model->load(Yii::$app->request->post()) ){
//            debug($model);
//            die;

            if( $model->validate() ){
                Yii::$app->session->setFlash('success', 'Данные успешно отправлены');
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Ошибка отправки');
            }
        }

        return $this->render('index', compact('model'));
    }
    public function actionShow()
    {
        $this->view->title = 'Одна статья';
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => 'Ключевые слова...']);
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'Описание страницы...']);
//        $this -> layout = 'basic';
        return $this->render('show');
    }
}