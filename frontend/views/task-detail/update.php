<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\task\TaskDetail */

$this->title = 'Update Task Detail: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Task Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="task-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
