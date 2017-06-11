<?php

namespace common\models\project;

/**
 * This is the ActiveQuery class for [[ProjectDetail]].
 *
 * @see ProjectDetail
 */
class ProjectDetailQuery extends \common\models\BaseQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ProjectDetail[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ProjectDetail|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
