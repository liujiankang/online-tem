<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\repository\RepositoryMonitor */

$this->title = 'Create Repository Monitor';
$this->params['breadcrumbs'][] = ['label' => 'Repository Monitors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repository-monitor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
