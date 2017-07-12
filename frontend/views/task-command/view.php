<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\task\TaskCommand */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Task Commands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-command-view">

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
            'task_basic_id',
            'task_detail_id',
            'host_id',
            'is_before_task',
            'command:ntext',
            'result:ntext',
            'status',
            'updated_at',
            'created_at',
        ],
    ]) ?>

</div>
