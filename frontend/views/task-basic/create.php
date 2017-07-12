<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\task\TaskBasic */

$this->title = 'Create Task Basic';
$this->params['breadcrumbs'][] = ['label' => 'Task Basics', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-basic-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
