<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[\common\models\host\HostBasic]].
 *
 * @see \common\models\host\HostBasic
 */
class HostBasicQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\host\HostBasic[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\host\HostBasic|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
