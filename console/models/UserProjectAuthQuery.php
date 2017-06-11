<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\common\models\project\UserProjectAuth]].
 *
 * @see \common\models\project\UserProjectAuth
 */
class UserProjectAuthQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\project\UserProjectAuth[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\project\UserProjectAuth|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
