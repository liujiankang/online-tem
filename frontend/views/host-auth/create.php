<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\host\HostAuth */

$this->title = 'Create Host Auth';
$this->params['breadcrumbs'][] = ['label' => 'Host Auths', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="host-auth-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
