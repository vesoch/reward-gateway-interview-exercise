<?php

namespace common\models\activeRecord;

use common\behaviors\TimestampBehavior;
use common\models\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\validators\RequiredValidator;
use yii\validators\StringValidator;

/**
 * Class Employee
 * @package common\models\activeRecord
 *
 * @property int $int
 * @property string $uuid
 * @property string $company
 * @property string $bio
 * @property string $name
 * @property string $title
 * @property string $avatar
 *
 */
class Employee extends ActiveRecord
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [['uuid', 'company', 'bio', 'name', 'title', 'avatar'], RequiredValidator::class],
            [['uuid', 'company', 'bio', 'name', 'title'], StringValidator::class],
        ];
    }
}
