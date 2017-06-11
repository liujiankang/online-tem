<?php

namespace common\models\project;

/**
 * This is the ActiveQuery class for [[UserProjectAuth]].
 *
 * @see UserProjectAuth
 */
class UserProjectAuthQuery extends \common\models\BaseQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return UserProjectAuth[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UserProjectAuth|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
