<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\task\TaskDetail */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Task Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-detail-view">

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
            'task_id',
            'project_id',
            'repo_id',
            'base_commit_hash',
            'task_commit_hash',
            'base_branch',
            'task_branch',
            'dir_dealing',
            'before_task',
            'after_task',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
