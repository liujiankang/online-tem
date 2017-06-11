<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\repository\RepositoryBasic */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('repository', 'Repository Basics'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repository-basic-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('repository', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('repository', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('repository', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'project_id',
            'name',
            'url:url',
            'type',
            'auth_type',
            'user_name',
            'user_pass',
            'created_at',
            'updated_at',
            'webdir_repodir_map',
        ],
    ]) ?>

</div>
