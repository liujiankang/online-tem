<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\project\ProjectDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Project Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Project Detail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'project_id',
            'host_id',
            'web_root',
            'log_root',
            'web_back',
            // 'log_back',
            // 'created_at',
            // 'updated_at',
            // 'is_master',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
