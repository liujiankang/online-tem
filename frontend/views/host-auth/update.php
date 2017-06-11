<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\host\HostAuth */

$this->title = 'Update Host Auth: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Host Auths', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="host-auth-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
