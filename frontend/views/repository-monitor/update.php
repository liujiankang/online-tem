<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\repository\RepositoryMonitor */

$this->title = 'Update Repository Monitor: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Repository Monitors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="repository-monitor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
