<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\task\TaskCommandSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Task Commands';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-command-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Task Command', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'task_basic_id',
            'task_detail_id',
            'host_id',
            'is_before_task',
            // 'command:ntext',
            // 'result:ntext',
            // 'status',
            // 'updated_at',
            // 'created_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
