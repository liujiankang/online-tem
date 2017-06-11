<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\project\UserProjectAuth */

$this->title = Yii::t('project', 'Create User Project Auth');
$this->params['breadcrumbs'][] = ['label' => Yii::t('project', 'User Project Auths'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-project-auth-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
