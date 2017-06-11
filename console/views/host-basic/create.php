<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\host\HostBasic */

$this->title = Yii::t('host', 'Create Host Basic');
$this->params['breadcrumbs'][] = ['label' => Yii::t('host', 'Host Basics'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="host-basic-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
