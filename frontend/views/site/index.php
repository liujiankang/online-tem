<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <p class="lead">online system powerd by LiuJianKang.</p>
    </div>

    <div class="body-content">
        <div class="row">
            <div class="col-lg-4">
                <h2> 主机管理</h2>
                <h2><a class="btn btn-lg btn-success" href="/host-basic/index">host basic</a></h2>
                <h2><a class="btn btn-lg btn-success" href="/user-host-auth/index">host auth</a></h2>
            </div>
            <div class="col-lg-4">
                <h2>工程代码库文件</h2>

                <h2><a class="btn btn-lg btn-success" href="/project-basic/index">project basic</a></h2>
                <h2><a class="btn btn-lg btn-success" href="/user-project-auth/index">project auth</a></h2>
                <h2><a class="btn btn-lg btn-success" href="/repository-basic/index">repository basic</a></h2>
            </div>
            <div class="col-lg-4">
                <h2>任务管理</h2>
                <h2><a class="btn btn-lg btn-success" href="/task-basic/index">task basic</a></h2>
                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
