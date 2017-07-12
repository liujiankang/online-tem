<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\task\TaskDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'task_id')->textInput() ?>

    <?= $form->field($model, 'project_id')->textInput() ?>

    <?= $form->field($model, 'repo_id')->textInput() ?>

    <?= $form->field($model, 'base_commit_hash')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'task_commit_hash')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'base_branch')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'task_branch')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dir_dealing')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'before_task')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'after_task')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
