<?php

namespace common\models;

use yii\base\Model;
use yii\data\DataProviderInterface;

/**
 * Class Search
 * @package common\models
 */
abstract class Search extends Model
{
    /**
     * Base dataprovider for the search, without any criteria applied
     * @return DataProviderInterface
     */
    abstract protected function getBaseDataProvider(): DataProviderInterface;

    /**
     * Applies search criteria to the dataprovider
     * @param DataProviderInterface $dataProvider
     * @return DataProviderInterface
     */
    abstract protected function internalSearch(DataProviderInterface $dataProvider): DataProviderInterface;

    final public function search(): DataProviderInterface
    {
        $result = $this->getBaseDataProvider();
        if ($this->validate()) {
            $result = $this->internalSearch($result);
        }
        return $result;
    }
}
