<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\common\models\repository\RepositoryBasic]].
 *
 * @see \common\models\repository\RepositoryBasic
 */
class RepositoryBasicQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\repository\RepositoryBasic[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\repository\RepositoryBasic|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
