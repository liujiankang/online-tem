<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\repository\RepositoryBasicSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Repository Basics';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repository-basic-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Repository Basic', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'url:url',
            'type',
            'auth_type',
            // 'user_name',
            // 'user_pass',
            // 'created_at',
            // 'updated_at',
            // 'local_path',
            // 'id_rsa:ntext',
            // 'id_rsa_pub:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
