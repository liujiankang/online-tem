<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\repository\RepositoryMonitorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="repository-monitor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'repo_id') ?>

    <?= $form->field($model, 'branch_tag') ?>

    <?= $form->field($model, 'last_commit') ?>

    <?= $form->field($model, 'last_commit_message') ?>

    <?php // echo $form->field($model, 'last_monitor_time') ?>

    <?php // echo $form->field($model, 'warned_commit') ?>

    <?php // echo $form->field($model, 'warned_time') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'warned_interval') ?>

    <?php // echo $form->field($model, 'warned_end_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
