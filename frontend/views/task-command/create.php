<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\task\TaskCommand */

$this->title = 'Create Task Command';
$this->params['breadcrumbs'][] = ['label' => 'Task Commands', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="task-command-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
