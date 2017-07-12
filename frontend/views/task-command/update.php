<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\task\TaskCommand */

$this->title = 'Update Task Command: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Task Commands', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="task-command-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
