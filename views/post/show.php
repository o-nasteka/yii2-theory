<?php // $this->title = 'Show Action';  ?>

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
?>

<?php debug($cats); ?>

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