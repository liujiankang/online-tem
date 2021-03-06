<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\host\HostBasicSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Host Basics';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="host-basic-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Host Basic', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'host_alias',
            'host_name',
            'host_ip',
            'auth_type',
            // 'user_pass',
            // 'user_name',
            // 'rsa_key_pri',
            // 'rsa_key_pub',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
