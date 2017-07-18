<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\task\TaskDetail */

$this->title = 'Update Task Detail: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Task Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
$this->registerJs('initBind();');
?>
<div class="task-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
<script language="JavaScript">
    function initBind() {
        $('repo_id').on('change',function () {
            $.get()
        });

        $('task_branch').on('change',function () {
            alert('task_branch');
        });
    }
</script>
