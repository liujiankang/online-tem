<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\project\ProjectDetail */

$this->title = Yii::t('project', 'Update {modelClass}: ', [
    'modelClass' => 'Project Detail',
]) . $model->project_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('project', 'Project Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->project_id, 'url' => ['view', 'id' => $model->project_id]];
$this->params['breadcrumbs'][] = Yii::t('project', 'Update');
?>
<div class="project-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
