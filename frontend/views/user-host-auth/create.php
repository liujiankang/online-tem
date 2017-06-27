<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\host\UserHostAuth */

$this->title = 'Create User Host Auth';
$this->params['breadcrumbs'][] = ['label' => 'User Host Auths', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-host-auth-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
