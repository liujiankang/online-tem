<?php

namespace common\model\host;

/**
 * This is the ActiveQuery class for [[UserHostAuth]].
 *
 * @see UserHostAuth
 */
class UserHostAuthQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return UserHostAuth[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UserHostAuth|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
