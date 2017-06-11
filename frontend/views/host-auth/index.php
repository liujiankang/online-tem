<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\host\HostAuthQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Host Auths';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="host-auth-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Host Auth', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'host_id',
            'user_id',
            'auth_type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
