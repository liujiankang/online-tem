<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\task\TaskCommand */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="task-command-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'task_basic_id')->textInput() ?>

    <?= $form->field($model, 'task_detail_id')->textInput() ?>

    <?= $form->field($model, 'host_id')->textInput() ?>

    <?= $form->field($model, 'is_before_task')->textInput() ?>

    <?= $form->field($model, 'command')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'result')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
