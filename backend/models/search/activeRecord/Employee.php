<?php

namespace backend\models\search\activeRecord;

use common\components\dataProviders\ActiveDataProvider;
use common\components\Yii;
use common\models\Search;
use yii\data\DataProviderInterface;
use yii\db\ActiveQuery;
use yii\validators\StringValidator;

/**
 * Class Employee
 * @package backend\models\search\activeRecord
 */
class Employee extends Search
{
    /**
     * @var string
     */
    public $uuid;

    /**
     * @var string
     */
    public $company;

    /**
     * @var string
     */
    public $bio;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $title;

    /**
     * @var string
     */
    public $avatar;

    /**
     * @var ActiveQuery
     */
    protected $query;

    /**
     * Employee constructor.
     * @param ActiveQuery $query
     * @param array $config
     */
    public function __construct(ActiveQuery $query, $config = [])
    {
        $this->query = $query;
        parent::__construct($config);
    }

    /**
     * @inheritDoc
     */
    protected function getBaseDataProvider(): DataProviderInterface
    {
        return Yii::createObject(ActiveDataProvider::class, [[
            'query' => $this->query
        ]]);
    }

    /**
     * @inheritDoc
     */
    protected function internalSearch(DataProviderInterface $dataProvider): DataProviderInterface
    {
        $query = $dataProvider->query;
        $query->andFilterWhere(['like', 'uuid', $this->uuid]);
        $query->andFilterWhere(['like', 'company', $this->company]);
        $query->andFilterWhere(['like', 'bio', $this->bio]);
        $query->andFilterWhere(['like', 'name', $this->company]);
        $query->andFilterWhere(['like', 'title', $this->company]);

        return $dataProvider;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            [['uuid', 'company', 'bio', 'name', 'title'], StringValidator::class],
        ];
    }
}
