<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\repository\RepositoryMonitorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Repository Monitors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repository-monitor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Repository Monitor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'repo_id',
            'branch_tag',
            'last_commit',
            'last_commit_message',
            // 'last_monitor_time:datetime',
            // 'warned_commit',
            // 'warned_time:datetime',
            // 'created_at',
            // 'updated_at',
            // 'warned_interval',
            // 'warned_end_time:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
