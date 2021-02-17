<?php

use backend\models\search\activeRecord\Employee as EmployeeSearch;
use backend\services\ImageRenderingService;
use common\components\dataProviders\ActiveDataProvider;
use kartik\grid\ActionColumn;
use kartik\grid\GridView;
use kartik\icons\Icon;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var View $this
 * @var EmployeeSearch $searchModel
 * @var ActiveDataProvider $dataProvider
 */

echo Html::beginTag('div', ['class' => ['text-right']]);
echo Html::endTag('div');

echo Html::tag('h3', \Yii::t('app', 'Employees'));

echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'attribute' => 'company',
        ],
        [
            'attribute' => 'bio',
        ],
        [
            'attribute' => 'name',
        ],
        [
            'attribute' => 'title',
        ],
        [
            'attribute' => 'avatar',
            'value' => function ($model) {
                return Html::img();
            }
        ],
//        [
//            'class' => ActionColumn::class,
//            'template' => '{view} {update} {delete}',
//            'buttons' => [
//                'delete' => function ($url, $model, $key) {
//                    return Html::a(
//                        Icon::show('trash', ['framework' => Icon::FA]),
//                        $url,
//                        [
//                            'title' => 'Delete',
//                            'data-method' => 'delete',
//                            'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'),
//                        ]
//                    );
//                }
//            ],
//        ]
    ],
]);
