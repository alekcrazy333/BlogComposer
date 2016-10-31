<?php
use yii\grid\GridView;
use yii\helpers\Html;

?>

<?= GridView::widget([
   'dataProvider'=>$dataProvider,
    'columns'=>[
        'id',
        'title',
        'content',
        'user_id',
        [
            'attribute' => 'img_src',
            'format' => 'html',
            'value' => function ($model) {
                return Html::img($model->img_src,
                    ['width' => '70px']);
            },
        ],
        'category_id',
        ['class'=>'yii\grid\ActionColumn',
            'buttons'=>[
                'view'=>function($url,$model){
                    return Html::a("<span class='glyphicon glyphicon-eye-open'></span>",['view-blog','id'=>$model->id]);
                },
                'update'=>function($url,$model){
                    return Html::a("<span class='glyphicon glyphicon-pencil'></span>",['edit-blog','id'=>$model->id]);
                },
                'delete'=>function($url,$model){
                    return Html::a("<span class='glyphicon glyphicon-trash'></span>",['delete-blog','id'=>$model->id]);
                }
            ]
        ]
    ]
]);
?>
