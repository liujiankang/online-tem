<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\repository\RepositoryBasic */

$this->title = 'Update Repository Basic: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Repository Basics', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="repository-basic-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
