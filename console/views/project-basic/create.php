<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\project\ProjectBasic */

$this->title = Yii::t('project', 'Create Project Basic');
$this->params['breadcrumbs'][] = ['label' => Yii::t('project', 'Project Basics'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-basic-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
