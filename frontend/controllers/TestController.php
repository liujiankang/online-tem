<?php
namespace frontend\controllers;

use common\services\RepositoryBasicService;
use Yii;
use yii\web\Controller;


/**
 * Site controller
 */
class TestController extends Controller
{


    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $params = Yii::$app->request->get();
        if (count($params) < 2) {
            echo htmlentities('?table=xxx&isModule=0&end=frontend&isRun=');
            exit;
        }
        $isModule = false;
        $tables = explode('_', ucwords($params['table'], '_'));
        unset($tables[0]);
        reset($tables);
//        var_dump($tables);die;
        $tableStr = implode('', $tables);
        if (count($tables) > 1) {
            $modelClass = strtolower($tables[1]) . '\\';
//            $viewDir = strtolower($tables[1]) . '/' . substr(str_replace('_', '-', $params['table']), 2);
        } else {
            $modelClass = '';
        }
        $viewDir = substr(str_replace('_', '-', $params['table']), 3);
        $end = $params['end'];
        $projectDir = Yii::getAlias('@root');
        $modelStr = "$projectDir/yii gii/model --tableName='{$params['table']}' --modelClass='{$tableStr}' --ns='common\\models\\{$modelClass}' --baseClass='common\\models\\BaseModel' --queryBaseClass='common\\models\\BaseQuery' --queryClass='{$tableStr}Query' --queryNs='common\\models\\{$modelClass}' --generateLabelsFromComments=0 --generateQuery=0 --overwrite=1 --enableI18N=0  --interactive=0 --useTablePrefix=0 --db='db'";
        $curdStr = "$projectDir/yii gii/crud --baseControllerClass='{$end}\\controllers\\BaseController' --controllerClass='{$end}\\controllers\\{$tableStr}Controller' --modelClass='common\\models\\{$modelClass}{$tableStr}' --searchModelClass='common\\models\\{$modelClass}{$tableStr}Search' --viewPath='{$end}/views/{$viewDir}' --indexWidgetType='grid' --messageCategory='host' --enableI18N=0 --enablePjax=0 --interactive=0 --overwrite=1";

        if ($params['isRun']) {
            $result1 = shell_exec($modelStr);
            $result2 = shell_exec($curdStr);
            var_dump([$result1, $result2]);
        }
        var_dump([$modelStr, $curdStr]);
    }

    public function actionTest()
    {
        $git = (new RepositoryBasicService())->getRepositoryInstance(1);
        var_dump($git);
    }

    public function actionTest2()
    {
        $responseDir = '';
        $bachDir = '';
        $response = $_GET['response'];
        if (empty($response)) {
            echo '分支不能为空';
            exit;
        }
        foreach (['yii,app,www,mg'] as $val) {
            $this->getLast($responseDir . '/' . $val, 'master');
            $this->getLast($responseDir . '/' . $val, 'dev');
            $cmd = "cd $responseDir/$val; git diff --name-only";
            $result = exec($cmd);
            var_dump($result);
        }
    }

    public function getLast($dir, $repo)
    {
        $cmd = "cd $dir; git checkout master;git pull origin master; git log | head -n 1";
        var_dump($cmd);
    }

}
