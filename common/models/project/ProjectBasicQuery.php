<?php

namespace common\models\project;

/**
 * This is the ActiveQuery class for [[ProjectBasic]].
 *
 * @see ProjectBasic
 */
class ProjectBasicQuery extends \common\models\BaseQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ProjectBasic[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ProjectBasic|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
