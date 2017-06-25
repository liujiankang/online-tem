<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\repository\RepositoryMonitor */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Repository Monitors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repository-monitor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'repo_id',
            'branch_tag',
            'last_commit',
            'last_commit_message',
            'last_monitor_time:datetime',
            'warned_commit',
            'warned_time:datetime',
            'created_at',
            'updated_at',
            'warned_interval',
            'warned_end_time:datetime',
        ],
    ]) ?>

</div>
