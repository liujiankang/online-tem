<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\common\models\project\ProjectBasic]].
 *
 * @see \common\models\project\ProjectBasic
 */
class ProjectBasicQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\project\ProjectBasic[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\project\ProjectBasic|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
