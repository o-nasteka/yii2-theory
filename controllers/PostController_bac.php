<?php
/**
 * Created by PhpStorm.
 * User: nasteka
 * Date: 3/6/17
 * Time: 20:48
 */

namespace app\controllers;

use app\models\Category;
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

//    Action Show
    public function actionShow()
    {
        $this->view->title = 'Одна статья';
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => 'Ключевые слова...']);
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'Описание страницы...']);
//        $this -> layout = 'basic';

//        $cats = Category::find()->all();
//        $cats = Category::find()->orderBy(['id' => SORT_DESC])->all();
//        $cats = Category::find()->asArray()->all();
//        $cats = Category::find()->asArray()->where(['parent'=>691])->all();
//        $cats = Category::find()->asArray()->where(['like', 'title', 'сс'])->all();
//        $cats = Category::find()->asArray()->where(['<=', 'id', 800])->all();
//         $cats = Category::find()->asArray()->where(['parent'=>691])->limit(1)->all();
//         $cats = Category::find()->asArray()->where(['parent'=>691])->limit(1)->one();
//         $cats = Category::find()->asArray()->where(['parent'=>691])->count();
//         $cats = Category::find()->asArray()->count();
//         $cats = Category::findOne(['parent'=>691]);
//         $cats = Category::findAll(['parent'=>691]);
//
//            $query = "SELECT * FROM categories WHERE title LIKE '%pp%'";
//        $cats = Category::findBySql($query)->all();
//
            $query = "SELECT * FROM categories WHERE title LIKE :search";
            $cats = Category::findBySql($query, [':search' => '%pp%'])->all();

        return $this->render('show', compact('cats'));
    }
}