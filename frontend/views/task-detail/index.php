<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\task\TaskDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Task Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Task Detail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'task_id',
            'project_id',
            'repo_id',
            'base_commit_hash',
            // 'task_commit_hash',
            // 'base_branch',
            // 'task_branch',
            // 'dir_dealing',
            // 'before_task',
            // 'after_task',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
