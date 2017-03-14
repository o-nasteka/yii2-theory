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

    /**
     * @return string|\yii\web\Response
     */
    public function actionIndex()
    {
        $this->view->title = 'Все статьи';
        if( Yii::$app->request->isAjax ){
//            debug($_POST);
            debug(Yii::$app->request->post());
            return 'test';
        }

//        $post = TestForm::findOne(2);
//        debug($post);
//        $post->delete();

//        debug($post);
//        $post->email = 'yi@yahoo.com';
//        $post->save();

//        Удаление всех данных с параметрами
//        TestForm::deleteAll(['>', 'id', 3]);

//        Удаление всех данных из таблицы
//        TestForm::deleteAll();

        $model = new TestForm();

//        $model->name = 'Автор';
//        $model->email = 'mail@mail.ua';
//        $model->text = 'Текст сообщения!';
//        $model->save();

        if ( $model->load(Yii::$app->request->post()) ){
//            debug($model);
//            die;

            if( $model->save() ){
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

//        $cats = Category::findOne(694);
//        $cats = Category::find()->with('products')->where('id=694')->all();
//        $cats = Category::find()->all(); // отложенная "ленивая" загрузка
        $cats = Category::find()->with('products')->all(); // жадная загрузка

        return $this->render('show', compact('cats'));
    }
}