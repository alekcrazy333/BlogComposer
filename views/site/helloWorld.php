<?php

use yii\widgets\ActiveForm;

$form = ActiveForm::begin(); ?>

<?= $form->field($model, 'name') ?>
<?= $form->field($model, 'email') ?>


<?= \yii\helpers\Html::submitButton()?>
<?php ActiveForm::end() ?>