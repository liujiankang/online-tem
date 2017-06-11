<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\project\ProjectBasic */

$this->title = 'Update Project Basic: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Project Basics', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="project-basic-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
