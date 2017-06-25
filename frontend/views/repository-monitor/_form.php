<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\repository\RepositoryMonitor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="repository-monitor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'repo_id')->textInput() ?>

    <?= $form->field($model, 'branch_tag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_commit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_commit_message')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_monitor_time')->textInput() ?>

    <?= $form->field($model, 'warned_commit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'warned_time')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'warned_interval')->textInput() ?>

    <?= $form->field($model, 'warned_end_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
