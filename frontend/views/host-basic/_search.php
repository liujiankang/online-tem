<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\host\HostBasicSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="host-basic-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'host_alias') ?>

    <?= $form->field($model, 'host_name') ?>

    <?= $form->field($model, 'host_ip') ?>

    <?= $form->field($model, 'auth_type') ?>

    <?php // echo $form->field($model, 'user_pass') ?>

    <?php // echo $form->field($model, 'user_name') ?>

    <?php // echo $form->field($model, 'rsa_key_pri') ?>

    <?php // echo $form->field($model, 'rsa_key_pub') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
