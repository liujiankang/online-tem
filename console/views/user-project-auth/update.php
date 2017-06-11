<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\project\UserProjectAuth */

$this->title = Yii::t('project', 'Update {modelClass}: ', [
    'modelClass' => 'User Project Auth',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('project', 'User Project Auths'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('project', 'Update');
?>
<div class="user-project-auth-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
