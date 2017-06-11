<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\repository\RepositoryBasic */

$this->title = Yii::t('repository', 'Create Repository Basic');
$this->params['breadcrumbs'][] = ['label' => Yii::t('repository', 'Repository Basics'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="repository-basic-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
