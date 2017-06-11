<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\host\HostBasic */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('host', 'Host Basics'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="host-basic-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('host', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('host', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('host', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'host_name',
            'host_ip',
            'auth_type',
            'user_pass',
            'user_name',
            'rsa_key_pri',
            'rsa_key_pub',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
