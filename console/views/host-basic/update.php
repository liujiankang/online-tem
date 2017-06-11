<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\host\HostBasic */

$this->title = Yii::t('host', 'Update {modelClass}: ', [
    'modelClass' => 'Host Basic',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('host', 'Host Basics'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('host', 'Update');
?>
<div class="host-basic-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
