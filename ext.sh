# /bin/bash
./yii gii/model --tableName='el_host_basic' --modelClass='HostBasic' --ns='common\models\host' --baseClass='common\models\BaseModel' --enableI18N=1 --queryBaseClass='common\models\BaseQuery' --queryClass='HostBasicQuery' --queryNs='common\models\host' --generateLabelsFromComments=0 --generateQuery=1 --overwrite=1  --interactive=0 --useTablePrefix=0 --db='db'
./yii gii/model --tableName='el_project_basic' --modelClass='ProjectBasic' --ns='common\models\project' --baseClass='common\models\BaseModel' --queryBaseClass='common\models\BaseQuery' --queryClass='ProjectBasicQuery' --queryNs='common\models\project' --generateLabelsFromComments=0 --generateQuery=1 --overwrite=1  --interactive=0 --useTablePrefix=0 --db='db'
./yii gii/model --tableName='el_project_detail' --modelClass='ProjectDetail' --ns='common\models\project' --baseClass='common\models\BaseModel' --queryBaseClass='common\models\BaseQuery' --queryClass='ProjectDetailQuery' --queryNs='common\models\project' --generateLabelsFromComments=0 --generateQuery=1 --overwrite=1  --interactive=0 --useTablePrefix=0 --db='db'
./yii gii/model --tableName='el_user_project_auth' --modelClass='UserProjectAuth' --ns='common\models\project' --baseClass='common\models\BaseModel' --queryBaseClass='common\models\BaseQuery' --queryClass='UserProjectAuthQuery' --queryNs='common\models\project' --generateLabelsFromComments=0 --generateQuery=1 --overwrite=1  --interactive=0 --useTablePrefix=0 --db='db'
./yii gii/model --tableName='el_repository_basic' --modelClass='RepositoryBasic' --ns='common\models\repository' --baseClass='common\models\BaseModel' --queryBaseClass='common\models\BaseQuery' --queryClass='RepositoryBasicQuery' --queryNs='common\models\repository' --generateLabelsFromComments=0 --generateQuery=1 --overwrite=1  --interactive=0 --useTablePrefix=0 --db='db'
./yii gii/model --tableName='el_user_host_auth' --modelClass='UserHostAuth' --ns='common\models\host' --baseClass='common\models\BaseModel' --queryBaseClass='common\models\BaseQuery' --queryClass='UserHostAuthQuery' --queryNs='common\models\host' --generateLabelsFromComments=0 --generateQuery=1 --overwrite=1  --interactive=0 --useTablePrefix=0 --db='db'


./yii gii/crud --baseControllerClass='frontend\controllers\BaseController' --controllerClass='frontend\controllers\HostBasicController' --modelClass='common\models\host\HostBasic' --searchModelClass='common\models\host\HostBasicSearch' --viewPath='@app/views/host-basic' --indexWidgetType='grid' --messageCategory='host' --enableI18N=1 --enablePjax=0 --interactive=0 --overwrite=1
./yii gii/crud --baseControllerClass='frontend\controllers\BaseController' --controllerClass='frontend\controllers\ProjectBasicController' --modelClass='common\models\project\ProjectBasic' --searchModelClass='common\models\project\ProjectBasicSearch' --viewPath='@app/views/project-basic' --indexWidgetType='grid' --messageCategory='project' --enableI18N=1 --enablePjax=0 --interactive=0 --overwrite=1
./yii gii/crud --baseControllerClass='frontend\controllers\BaseController' --controllerClass='frontend\controllers\ProjectDetailController' --modelClass='common\models\project\ProjectDetail' --searchModelClass='common\models\project\ProjectDetailSearch' --viewPath='@app/views/project-detail' --indexWidgetType='grid' --messageCategory='project' --enableI18N=1 --enablePjax=0 --interactive=0 --overwrite=1
./yii gii/crud --baseControllerClass='frontend\controllers\BaseController' --controllerClass='frontend\controllers\UserProjectAuthController' --modelClass='common\models\project\UserProjectAuth' --searchModelClass='common\models\project\UserProjectAuthSearch' --viewPath='@app/views/user-project-auth' --indexWidgetType='grid' --messageCategory='project' --enableI18N=1 --enablePjax=0 --interactive=0 --overwrite=1
./yii gii/crud --baseControllerClass='frontend\controllers\BaseController' --controllerClass='frontend\controllers\RepositoryBasicController' --modelClass='common\models\repository\RepositoryBasic' --searchModelClass='common\models\repository\RepositoryBasicSearch' --viewPath='@app/views/repository-basic' --indexWidgetType='grid' --messageCategory='repository' --enableI18N=1 --enablePjax=0 --interactive=0 --overwrite=1
./yii gii/crud --baseControllerClass='frontend\controllers\BaseController' --controllerClass='frontend\controllers\UserHostAuthController' --modelClass='common\models\host\UserHostAuth' --searchModelClass='common\models\host\UserHostAuthSearch' --viewPath='@app/views/user-host-auth' --indexWidgetType='grid' --messageCategory='host' --enableI18N=1 --enablePjax=0 --interactive=0 --overwrite=1
