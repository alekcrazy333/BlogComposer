<ul>
    <?php foreach($user as $com) : ?>
    <li>
        <?= $com->name . "; email - " . $com->email . "; phone - " . $com->phone ?>
    </li>
    <?php endforeach ?>
</ul>
<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin(); ?>

<?= $form->field($model,'name') ?>
<?= $form->field($model,'email') ?>
<?= $form->field($model,'password')->passwordInput() ?>
<?= $form->field($model,'phone') ?>
<?php $listCity =  ArrayHelper::map($city,'id','name');?>
<?= $form->field($model, 'city')->dropDownList($listCity,[]); ?>


<?= Html::submitButton()?>
<?php ActiveForm::end() ?>