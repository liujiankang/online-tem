<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\common\models\project\ProjectDetail]].
 *
 * @see \common\models\project\ProjectDetail
 */
class ProjectDetailQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\project\ProjectDetail[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\project\ProjectDetail|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
