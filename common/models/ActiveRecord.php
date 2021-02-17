<?php

namespace common\models;

use yii\db\ActiveRecord as BaseActiveRecord;

/**
 * Class ActiveRecord
 * @package common\models
 */
class ActiveRecord extends BaseActiveRecord
{
    const SCENARIO_CREATE = 'create';
    const SCENARIO_DELETE = 'delete';
    const SCENARIO_UPDATE = 'update';
}
