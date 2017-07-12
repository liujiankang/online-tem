<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\task\TaskDetail */

$this->title = 'Create Task Detail';
$this->params['breadcrumbs'][] = ['label' => 'Task Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
