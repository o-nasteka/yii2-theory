<?php // $this->title = 'Show Action';
    use app\components\MyWidget;
?>

<?php $this->beginBlock('block1'); ?>
    <h2>Заголовок страницы</h2>
<?php $this->endBlock(); ?>

<h1>Show Action</h1>

<?php
//  orderBy
//    foreach($cats as $cat){
//        echo $cat->title . '<br>';
//    }
?>

<?php
//  asArray
//    foreach($cats as $cat){
//        echo $cat['title'] . '<br>';
//    }
//?>

<?php // debug($cats); ?>
<?php // echo count($cats[0]->products); ?>
<?php // debug($cats); ?>


<!-- Использованиие собственных Widget -->
<?php
    // передаем доп.параметр $name
//    echo MyWidget::widget(['name' => 'Вася!']);

// Использование без параметров
//    echo MyWidget::widget();
?>

<!-- Использование собственного контента в Widget-->
    <?php MyWidget::begin(); ?>
        <h1>привет, мир!</h1>
    <?php MyWidget::end();?>

    <!-- Использование собственного контента в Widget-->
<?php MyWidget::begin(); ?>
    <h1>привет, мир!</h1>
<?php MyWidget::end();?>

<!-- Работа с базой, связанные таблицы products-> categories -->
<?php
//    foreach ($cats as $cat){
//        echo '<ul>';
//            echo '<li>'. $cat->title. '</li>';
//            $products = $cat->products;
//            foreach ($products as $product){
//                echo '<ul>';
//                echo '<li>' . $product->title .'</li>';
//                echo '</ul>';
//            }
//        echo '</ul>';
//    }
//?>



<button class="btn btn-success" id="btn">Click me!</button>

<?php
//
//    $this->registerJsFile(
//        '@web/js/scripts.js', ['depends' => 'yii\web\YiiAsset']
//    );
//
//?>

<?php
//    $this->registerJs(
//        " $('.container').append('<p>Show!!!</p>'); ", \yii\web\View::POS_LOAD
//    );
//?>
<?php
//    $this->registerCss('.container{background: #ccc;}');
//?>

<?php
$script = <<< JS

   $('#btn').on('click', function(){
        $.ajax({
            url: 'index.php?r=post/index',
            data: {test: 123},
            type: 'POST',
            success: function(res){
                console.log(res);
            },
            error: function(){
                alert('Error!');
            }
        });
   })
JS;

$this->registerJs($script);

?>