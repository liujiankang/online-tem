<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\task\TaskCommandSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-command-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'task_basic_id') ?>

    <?= $form->field($model, 'task_detail_id') ?>

    <?= $form->field($model, 'host_id') ?>

    <?= $form->field($model, 'is_before_task') ?>

    <?php // echo $form->field($model, 'command') ?>

    <?php // echo $form->field($model, 'result') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
