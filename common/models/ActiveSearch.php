<?php

namespace common\models;

use JCIT\models\search\ActiveSearch as BaseActiveSearch;
use yii\db\ActiveQuery;

/**
 * Class ActiveSearch
 * @package common\models
 */
class ActiveSearch extends BaseActiveSearch
{
    /**
     * @param ActiveQuery $query
     */
    protected function internalSearchQuery(ActiveQuery $query): void
    {
    }
}
