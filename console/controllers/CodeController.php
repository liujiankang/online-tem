<?php
namespace console\controllers;
use yii\console\Controller;

class CodeController extends Controller {
    public function getBranchLastLog($branch){
        $pull="git checkout $branch;git pull origin $branch;";
        $last="git log --branches=$branch --format=\"%H\" |head -1";
        exec($pull);
        return exec($last);
    }

}