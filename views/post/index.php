<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<?php // $this->title = 'Index Action';  ?>
<h1>Index Action</h1>

<?php //debug($model)?>

<!-- Success -->
<?php if( Yii::$app->session->hasFlash('success') ): ?>
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('success'); ?>
    </div>
<?php endif; ?>

<!-- Error -->
<?php if( Yii::$app->session->hasFlash('error') ): ?>
    <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo Yii::$app->session->getFlash('error'); ?>
    </div>
<?php endif; ?>

<?php $form = ActiveForm::begin( ['options' => ['id' => 'testForm']] ); ?>
<!--  --><?//= $form->field($model, 'name')->label('Введите имя:') ?>
  <?= $form->field($model, 'name') ?>
  <?= $form->field($model, 'email')->input('email') ?>
<!--  --><?//= $form->field($model, 'text')->label('Введите текст сообщения:')->textarea(['rows' => '5']) ?>
  <?= $form->field($model, 'text')->textarea(['rows' => '5']) ?>
  <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end(); ?>


