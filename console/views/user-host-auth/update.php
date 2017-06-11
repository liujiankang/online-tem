<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\host\UserHostAuth */

$this->title = Yii::t('host', 'Update {modelClass}: ', [
    'modelClass' => 'User Host Auth',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('host', 'User Host Auths'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('host', 'Update');
?>
<div class="user-host-auth-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
