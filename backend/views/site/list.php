<?php

use yii\db\ActiveQuery;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var View $this
 * @var ActiveQuery $employees
 */

echo Html::beginTag('div', ['class' => ['row']]); // row
echo Html::beginTag('div', ['class' => ['col-1']]); // col
echo Html::endTag('div'); // col

echo Html::beginTag('div', ['class' => ['col-8', 'people-card']]); // col

echo Html::tag('h4', Yii::t('app', 'People'), ['class' => ['header']]);

foreach ($employees as $employee) {
    echo Html::beginTag('div', ['class' => ['row', 'divider-bottom']]); // row

    echo Html::beginTag('div', ['class' => ['d-none', 'd-md-block', 'col-0', 'col-md-2', 'entity-result-image']]); // col
    echo Html::img($employee->avatar ?? Yii::$app->basePath. '/web/assets/images/default-profile-image.png', ['class' => ['profile-image']]);
    echo Html::endTag('div'); // col

    echo Html::beginTag('div', ['class' => ['col-12', 'col-md-10', 'entity-result-content']]); // col
    echo Html::tag('h6', Yii::t('app', $employee->name), ['class' => ['name', 'mb-0'], 'id' => ['name-field']]);
    echo Html::tag('p', Yii::t('app', ($employee->title . ' at ' . $employee->company)), ['class' => ['title', 'mb-1']]);
    echo Html::tag('p', Yii::t('app', $employee->bio), ['class' => ['bio']]);

    echo Html::endTag('div'); // col

    echo Html::endTag('div'); // row
}
echo Html::endTag('div'); // col


echo Html::beginTag('div', ['class' => ['col-3']]); // col
echo Html::endTag('div'); // col
echo Html::endTag('div'); // row
