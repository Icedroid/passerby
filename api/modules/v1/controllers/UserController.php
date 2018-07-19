<?php

namespace api\modules\v1\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\rest\OptionsAction;
use yii\rest\IndexAction;
use yii\web\Response;
use yii\filters\auth\HttpBearerAuth;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\QueryParamAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\data\ActiveDataProvider;


class UserController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\User';
//    public $serializer = [
//        'class' => \yii\rest\Serializer::class,
//        'collectionEnvelope' => 'items',
//    ];

//    public function checkAccess($action, $model = null, $params = [])
//    {
//        // check if the user can access $action and $model
//        // throw ForbiddenHttpException if access should be denied
//        if ($action === 'create' || $action === 'delete') {
//            if ($model->author_id !== \Yii::$app->user->id)
//                throw new \yii\web\ForbiddenHttpException(sprintf('You can only %s articles that you\'ve created.', $action));
//        }
//    }

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
            'only' => [
                'index', 'view', 'update', 'update-by-wechat'
            ],
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
     * 保存微信端的用户信息
     *
     * @SWG\Post(path="/users/wechat",
     *     tags={"user"},
     *     summary="保存微信端的用户信息",
     *     description="返回用户信息",
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
     *        name = "body",
     *        description = "微信信息的整个json作为内容体",
     *        required = true,
     *        @SWG\Schema(ref="#/definitions/WechatUser"),
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
     * @SWG\Post(path="/users",
     *     tags={"user"},
     *     summary="更新用户信息",
     *     description="返回用户信息",
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
     *        name = "body",
     *        description = "用户要更新的信息的整个json作为内容体",
     *        required = true,
     *        @SWG\Schema(ref="#/definitions/User"),
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
     * @SWG\Get(path="/users",
     *     tags={"user"},
     *     summary="找人",
     *     description="返回用户列表",
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *        in = "query",
     *        name = "nickname",
     *        description = "查询条件",
     *        required = false,
     *        type = "string"
     *     ),
     *     @SWG\Response(
     *         response = 200,
     *         description = " success",
     *         @SWG\Schema(ref="#/definitions/User")
     *     )
     * )
     *
     */

    /**
     *
     * @SWG\Get(path="/users/{id}",
     *     tags={"user"},
     *     summary="获取单个用户的信息",
     *     description="返回用户信息",
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *        in = "path",
     *        name = "id",
     *        description = "用户ID",
     *        required = true,
     *        type = "integer"
     *     ),
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
     *         @SWG\Schema(ref="#/definitions/User"),
     *     )
     * )
     *
     */
    public function actions()
    {
        $actions = [
            'index' => [
                'class' => 'yii\rest\IndexAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ],
            'view' => [
                'class' => 'yii\rest\ViewAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
            ],
            'update' => [
                'class' => '\api\modules\v1\actions\user\UpdateAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
                'scenario' => $this->updateScenario,
            ],
            'update-by-wechat' => [
                'class' => \api\modules\v1\actions\user\UpdateByWechatAction::class,
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
                'scenario' => $this->updateScenario,
            ],
//            'delete' => [
//                'class' => 'yii\rest\DeleteAction',
//                'modelClass' => $this->modelClass,
//                'checkAccess' => [$this, 'checkAccess'],
//            ],
//            'options' => [
//                'class' => 'yii\rest\OptionsAction',
//            ],
        ];

        // 使用"prepareDataProvider()"方法自定义数据provider
//        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
        $actions['index']['dataFilter'] = [
            'class' => \yii\data\ActiveDataFilter::class,
            'filterAttributeName' => 'where',
            'searchModel' => function () {
                return (new \yii\base\DynamicModel(['id' => null, 'status' => null, 'nickname' => null,]))
                    ->addRule('id', 'integer')
                    ->addRule('status', 'integer')
                    ->addRule('nickname', 'trim')
                    ->addRule('nickname', 'string');
            },
            'filter' => ['status' => ($this->modelClass)::STATUS_ACTIVE],
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
        $query = $modelClass::find()->select([])->where([]);
        if (!empty($filter)) {
            $query->andWhere($filter);
        }

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
                    'created_at' => SORT_DESC,
                    'id' => SORT_DESC,
                ],
                'params' => $requestParams,
            ],
        ]);

        return $dataProvider;
    }

}
