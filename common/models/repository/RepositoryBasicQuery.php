<?php

namespace common\models\repository;

/**
 * This is the ActiveQuery class for [[RepositoryBasic]].
 *
 * @see RepositoryBasic
 */
class RepositoryBasicQuery extends \common\models\BaseQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return RepositoryBasic[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return RepositoryBasic|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
