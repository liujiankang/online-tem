<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\task\TaskDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'task_id') ?>

    <?= $form->field($model, 'project_id') ?>

    <?= $form->field($model, 'repo_id') ?>

    <?= $form->field($model, 'base_commit_hash') ?>

    <?php // echo $form->field($model, 'task_commit_hash') ?>

    <?php // echo $form->field($model, 'base_branch') ?>

    <?php // echo $form->field($model, 'task_branch') ?>

    <?php // echo $form->field($model, 'dir_dealing') ?>

    <?php // echo $form->field($model, 'before_task') ?>

    <?php // echo $form->field($model, 'after_task') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
