<?php
/**
 * Created by PhpStorm.
 * User: ufo
 * Date: 17-6-11
 * Time: 下午5:56
 */

namespace common\services;


use common\models\repository\RepositoryBasic;
use GitElephant\Repository;
use SebastianBergmann\Diff\Differ;
use yii\base\InvalidConfigException;
use yii\helpers\FileHelper;
use Yii;

/*
 *
 * */

class RepositoryBasicService extends BaseService
{
    public $authFile;
    public $repositoryBasic;
    /* @var $repositoryInstance Repository */
    public $repositoryInstance;

    public function setAuth(RepositoryBasic $repositoryBasic)
    {
        $name = md5($repositoryBasic->id . $repositoryBasic->name);
        $path = "/home/www-data/.ssh/$name";
        $pathPub = "/home/www-data/.ssh/$name.pub";
        if ($repositoryBasic->auth_type == RepositoryBasic::AUTH_TYPE_RSAKEY) {

            //私钥
            $fHand = fopen($path, 'w');
            fwrite($fHand, $repositoryBasic->id_rsa);
            fclose($fHand);
            chmod($path, '600');

            //公钥

            $fHand = fopen($pathPub, 'w');
            fwrite($fHand, $repositoryBasic->id_rsa);
            fclose($fHand);
            chmod($pathPub, '600');

        }
    }

    public function unsetAuth()
    {

    }

    public function init(RepositoryBasic $repositoryBasic)
    {
        try {
            $this->setAuth($repositoryBasic);
            if (!empty($repositoryBasic->local_path)) {
                $repo_dir = \Yii::getAlias($repositoryBasic->local_path);
                $repositoryInstance = Repository::open($repo_dir);
            } else {
                $repo_dir_name = md5($repositoryBasic->id . $repositoryBasic->name . $repositoryBasic->url);
                $repo_dir_alias = '@common' . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . $repo_dir_name;
                $repo_dir = \Yii::getAlias($repo_dir_alias);
                Yii::trace($repo_dir);
                if (is_dir($repo_dir)) {
                    FileHelper::removeDirectory($repo_dir);
                }
                FileHelper::createDirectory($repo_dir);
                $repositoryInstance = Repository::createFromRemote($repositoryBasic->url, $repo_dir);
                if ($repositoryInstance instanceof Repository) {
                    $repositoryBasic->local_path = $repo_dir_alias;
                    $repositoryBasic->save();
                    Yii::info(['save repo directory', $repositoryBasic->id, $repositoryBasic->local_path], __CLASS__);
                }
            }
        } catch (\Exception $e) {
            throw $e;
        }

        $this->repositoryInstance = $repositoryInstance;
        $this->refresh();
        return $this;

//        $commit = $repositoryInstance->getCommit();
//        var_dump($commit->getMessage());
//        var_dump($commit->getSha());
//        var_dump($commit->getCommitter());
//        var_dump($commit->getContainedIn());
//        var_dump($commit->getTree());
//        //var_dump($commit->getRepository());
//        //var_dump($commit->getDiff());
//        var_dump($commit->getParents());

//        $repo->cloneFrom("git://github.com/matteosister/GitElephant.git");
//        Repository::createFromRemote();
//        //$repo->getCaller()->execute('');
//        //var_dump($repo->getBranches());
//        var_dump($repo->getLog('master_new', null, 2)->first()->getMessage()->toString());
//        var_dump($repo->getLog('master_new', null, 2)->first()->getSha());
//        var_dump($repo->getLog('master', null, 2)->first()->getMessage()->toString());
//        var_dump($repo->getLog('master', null, 2)->first()->getSha());
//        return $this;
    }

    public function getLastCommitMsg($tagOrBranch = null)
    {
        if ($this->repositoryInstance && ($this->repositoryInstance instanceof Repository)) {
            return $message = $this->repositoryInstance->getCommit($tagOrBranch)->getMessage()->toString();
        } else {
            throw new \Exception('没有实例化库');
        }
    }

    public function getLastCommitSha($tagOrBranch = null)
    {
        if ($this->repositoryInstance && ($this->repositoryInstance instanceof Repository)) {
            return $hash = $this->repositoryInstance->getCommit($tagOrBranch)->getSha();
        } else {
            throw new \Exception('没有实例化库');
        }
    }

    public function isHaveBranch($tag)
    {
        $allBranchArray = $this->repositoryInstance->getBranches(true);
        return in_array($tag, $allBranchArray);

        $allBranch = $this->repositoryInstance->getBranches();
        var_dump($allBranchArray);
        var_dump($allBranch);
        $allBranch = $this->repositoryInstance->getBranchOrTag('master');
        var_dump($allBranch);
        die;
    }

    public function refresh($tag = null)
    {
        $this->repositoryInstance->fetch();
        $checkoutInfo = $this->repositoryInstance->checkoutAllRemoteBranches();
        if (!empty($tag) && $this->isHaveBranch($tag)) {
            $this->repositoryInstance->pull($tag);
        }

        Yii::info(['repository refresh', $checkoutInfo], __CLASS__);
    }

    public function getDiffOfTwoCommit($hashOld, $hashNew)
    {
//        $hashOld = '080f1afa4c25895a8238796108d37fbd72384f48';
//        $hashNew = '9a5e84ac17be805695a472eb596ad87a93f171fa';
        if (empty($hashOld) || empty($hashNew)) {
            throw new \Exception('请输入比较的两次提交');
        }
        return $diffObjects = $this->repositoryInstance->getDiff($hashNew, $hashOld);
    }


    public function getDiffFilesOfCommitByObject(\GitElephant\Objects\Diff\Diff $diffObjects)
    {
        $returnArray = [];
        foreach ($diffObjects as $one) {
            $oldPath = $one->getOriginalPath();
            $newPath = $one->getDestinationPath();
            array_push($returnArray, ['oldPath' => $oldPath, 'newPath' => $newPath]);
        }
        return $returnArray;
    }

    public function getDiffFilesOfCommitByCmd($commitOld, $commitNew)
    {
        $diffFile = $this->repositoryInstance->getCaller()->execute("diff $commitOld $commitNew --name-only")->getOutput();
        $diffFiles = explode(' ', $diffFile);
        $returnArray = [];
        foreach ($diffFiles as &$one) {
            if (empty($one) || $one == ' ') {
                //do nothing
            } else {
                array_push($returnArray, $one);
            }
        }
        return $returnArray;
    }
}