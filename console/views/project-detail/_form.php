<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\project\ProjectDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'host_id')->textInput() ?>

    <?= $form->field($model, 'web_root')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'log_root')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'web_back')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'log_back')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('project', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
