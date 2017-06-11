<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\project\ProjectDetail */

$this->title = $model->project_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('project', 'Project Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-detail-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('project', 'Update'), ['update', 'id' => $model->project_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('project', 'Delete'), ['delete', 'id' => $model->project_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('project', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'project_id',
            'host_id',
            'web_root',
            'log_root',
            'web_back',
            'log_back',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
