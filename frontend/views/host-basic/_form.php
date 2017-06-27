<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\host\HostBasic */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="host-basic-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'host_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'host_ip')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'auth_type')->textInput() ?>

    <?= $form->field($model, 'user_pass')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rsa_key_pri')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rsa_key_pub')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
