<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\rest\IndexAction;
use yii\web\Response;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\QueryParamAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\data\ActiveDataProvider;
use api\modules\v1\actions\SearchAction;
use api\modules\v1\models\search\HelpSearch;


class HelpController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\Help';
//    public $serializer = [
//        'class' => \yii\rest\Serializer::class,
//        'collectionEnvelope' => 'items',
//    ];

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;//默认浏览器打开返回json
        $behaviors['authenticator'] = [
            'class' => CompositeAuth::className(),
            'authMethods' => [
//                HttpBasicAuth::className(),
                HttpBearerAuth::className(),
                QueryParamAuth::className(),
//                [
//                    'class' => QueryParamAuth::className(),
//                    'tokenParam'=>'access_token',//修改query的参数名
//                ],
            ],
//            'only' => [
//                'index', 'view', 'create', 'update', 'delete'
//            ],
//            'class'=>HttpBearerAuth::className(),
//            'only'=>[
//                'index'
//            ],
        ];
        return $behaviors;
    }

    /**
     * {@inheritdoc}
     */
    protected function verbs()
    {
        return [];
    }

    /**
     *
     * @SWG\Post(path="/helps",
     *     tags={"help"},
     *     summary="添加求助",
     *     description="返回成功信息",
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *        in = "query",
     *        name = "access-token",
     *        description = "access-token",
     *        required = true,
     *        type = "string"
     *     ),
     *     @SWG\Parameter(
     *        in = "body",
     *        name = "content",
     *        description = "用户求助内容content",
     *        required = true,
     *        @SWG\Schema(ref="#/definitions/Help"),
     *     ),
     *     @SWG\Response(
     *         response = 200,
     *         description = " success"
     *     )
     * )
     *
     */

    /**
     *
     * @SWG\Post(path="/helps/{id}",
     *     tags={"help"},
     *     summary="更新求助",
     *     description="返回成功信息",
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *        in = "path",
     *        name = "id",
     *        description = "求助ID",
     *        required = true,
     *        type = "integer"
     *     ),
     *     @SWG\Parameter(
     *        in = "query",
     *        name = "access-token",
     *        description = "access-token",
     *        required = true,
     *        type = "string"
     *     ),
     *     @SWG\Parameter(
     *        in = "body",
     *        name = "body",
     *        description = "求助内容content",
     *        required = true,
     *        @SWG\Schema(ref="#/definitions/Help"),
     *     ),
     *     @SWG\Response(
     *         response = 200,
     *         description = " success"
     *     )
     * )
     *
     */

    /**
     *
     * @SWG\Post(path="/helps/delete/{id}",
     *     tags={"help"},
     *     summary="删除求助",
     *     description="返回成功信息",
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *        in = "query",
     *        name = "access-token",
     *        description = "access-token",
     *        required = true,
     *        type = "string"
     *     ),
     *     @SWG\Parameter(
     *        in = "path",
     *        name = "id",
     *        description = "求助ID",
     *        required = true,
     *        type = "integer"
     *     ),
     *     @SWG\Parameter(
     *        in = "body",
     *        name = "body",
     *        description = "{}",
     *        required = true,
     *        @SWG\Schema(ref="#/definitions/Help"),
     *     ),
     *     @SWG\Response(
     *         response = 200,
     *         description = " success"
     *     )
     * )
     *
     */

    /**
     *
     * @SWG\Get(path="/helps",
     *     tags={"help"},
     *     summary="获取我的求助列表",
     *     description="返回求助列表",
     *     produces={"application/json"},
     *    @SWG\Parameter(
     *        in = "query",
     *        name = "access-token",
     *        description = "access-token",
     *        required = true,
     *        type = "string"
     *     ),
     *     @SWG\Response(
     *         response = 200,
     *         description = " success",
     *         @SWG\Schema(ref="#/definitions/Help"),
     *     )
     * )
     *
     */

    /**
     *
     * @SWG\Get(path="/helps/search",
     *     tags={"help"},
     *     summary="搜索所有的求助列表",
     *     description="返回求助列表",
     *     produces={"application/json"},
     *    @SWG\Parameter(
     *        in = "query",
     *        name = "access-token",
     *        description = "access-token",
     *        required = true,
     *        type = "string"
     *     ),
     *    @SWG\Parameter(
     *        in = "query",
     *        name = "is_emergency",
     *        description = "紧急is_emergency=1 不紧急is_emergency=0全部 不用传",
     *        required = false,
     *        type = "string"
     *     ),
     *    @SWG\Parameter(
     *        in = "query",
     *        name = "is_pay",
     *        description = "愿意付费is_pay=1 不愿意 is_pay=0 全部 不用传",
     *        required = false,
     *        type = "string"
     *     ),
     *    @SWG\Parameter(
     *        in = "query",
     *        name = "comment_count",
     *        description = "回复少 comment_count = 0  回复多 comment_count = 1",
     *        required = false,
     *        type = "string"
     *     ),
     *    @SWG\Parameter(
     *        in = "query",
     *        name = "end_date",
     *        description = "最新 end_date=0 截止 end_date=1 全部 end_date=2",
     *        required = false,
     *        type = "string"
     *     ),
     *     @SWG\Parameter(
     *        in = "query",
     *        name = "content",
     *        description = "内容关键字",
     *        required = false,
     *        type = "string"
     *     ),
     *     @SWG\Response(
     *         response = 200,
     *         description = " success",
     *         @SWG\Schema(ref="#/definitions/Help"),
     *     )
     * )
     *
     */

    /**
     *
     * @SWG\Get(path="/helps/{id}",
     *     tags={"help"},
     *     summary="获取用户某一条求助",
     *     description="返回一条求助",
     *     produces={"application/json"},
     *    @SWG\Parameter(
     *        in = "query",
     *        name = "access-token",
     *        description = "access-token",
     *        required = true,
     *        type = "string"
     *     ),
     *    @SWG\Parameter(
     *        in = "path",
     *        name = "id",
     *        description = "求助ID",
     *        required = true,
     *        type = "integer"
     *     ),
     *     @SWG\Response(
     *         response = 200,
     *         description = " success",
     *         @SWG\Schema(ref="#/definitions/Help"),
     *     )
     * )
     *
     */
    public function actions()
    {
        $actions = parent::actions();

        // 禁用"delete" 和 "create" 动作
//        unset($actions['delete']);

        // 使用"prepareDataProvider()"方法自定义数据provider
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

        $actions['search'] = [
            'class' => SearchAction::className(),
            'modelClass' => $this->modelClass,
            'checkAccess' => [$this, 'checkAccess'],
            'data' => [new HelpSearch(), 'search'],
        ];

        return $actions;
    }

    /**
     * 参考IndexAction的prepareDataProvider来修改
     *
     * @param $action IndexAction
     * @param $filter yii\data\ActiveDataFilter
     * @return ActiveDataProvider
     * @throws \Throwable
     */
    public function prepareDataProvider($action, $filter)
    {
        $requestParams = Yii::$app->getRequest()->getBodyParams();
        if (empty($requestParams)) {
            $requestParams = Yii::$app->getRequest()->getQueryParams();
        }

        /* @var $modelClass \yii\db\BaseActiveRecord */
        $modelClass = $this->modelClass;

        $query = $modelClass::find()->select(['{{help}}.*', '{{user}}.nickname', '{{user}}.avatar'])
            ->where(['uid' => Yii::$app->getUser()->getIdentity()->getId()])
            ->joinWith('user');

        $dataProvider = Yii::createObject([
            'class' => ActiveDataProvider::className(),
            'query' => $query,
            'pagination' => [
                'params' => $requestParams,
                'pageParam' => 'page',
                'pageSizeParam' => 'limit',
                'defaultPageSize' => 20,
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ],
                'params' => $requestParams,
            ],
        ]);

        return $dataProvider;
    }

}
