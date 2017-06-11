<?php

namespace common\models\host;

/**
 * This is the ActiveQuery class for [[HostBasic]].
 *
 * @see HostBasic
 */
class HostBasicQuery extends \common\models\BaseQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return HostBasic[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HostBasic|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
