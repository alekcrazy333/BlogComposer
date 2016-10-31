<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(); ?>

<?= $form->field($model,'title') ?>
<?= $form->field($model,'content') ?>
<?= $form->field($model,'user_id') ?>
<?= $form->field($model,'category_id') ?>
<?= $form->field($model,'created_at') ?>
<?= $form->field($model,'updated_at') ?>
<?= $form->field($model,'img_src') ?>




<?= Html::submitButton()?>
<?php ActiveForm::end() ?>