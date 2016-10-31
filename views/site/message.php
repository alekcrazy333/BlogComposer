<?php

use yii\widgets\ActiveForm;
use yii\widgets\ActiveFormAsset;


use yii\widgets\ActiveField;



$form = ActiveForm::begin(); ?>


<?= $form->field($model, 'name') ?>
<?= $form->field($model, 'emailFrom')->textInput(['type' => 'email']) ?>
<?= $form->field($model, 'emailTo')->textInput(['type' => 'email']) ?>
<?= $form->field($model, 'subject') ?>
<?= $form->field($model, 'message')->textarea() ?>
<?= $form->field($model, 'file')->fileInput() ?>


<?= \yii\helpers\Html::submitButton()?>
<?php ActiveForm::end();
function afcd(){

}

?>

