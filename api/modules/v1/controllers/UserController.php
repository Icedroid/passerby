<?php

namespace api\modules\v1\controllers;

use common\helpers\ResponseHelper;
use common\models\UserExperience;
use Yii;
use yii\db\ActiveRecord;
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
    public $serializer = [
        'class' => \yii\rest\Serializer::class,
        'collectionEnvelope' => 'items',
    ];

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
//            'only' => [
//                'index', 'view', 'update', 'update-by-wechat'
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
     *        name = "access-token",
     *        description = "access-token",
     *        required = true,
     *        type = "string"
     *     ),
     *     @SWG\Parameter(
     *        in = "query",
     *        name = "q",
     *        description = "查询条件",
     *        required = false,
     *        type = "string"
     *     ),
     *     @SWG\Parameter(
     *        in = "query",
     *        name = "online",
     *        description = "0-全部 1-在线 2-不在线",
     *        required = false,
     *        type = "integer"
     *     ),
     *     @SWG\Parameter(
     *        in = "query",
     *        name = "order",
     *        description = "排序条件 0-默认 1-经验丰富 2-咨询次数多 3-评价好 4-咨询单价低 5-咨询单价高",
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

    /**
     *
     * @SWG\Get(path="/users/profile",
     *     tags={"user"},
     *     summary="获取当前登录用户的信息",
     *     description="返回当前登录用户信息",
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
            'profile' => [
                'class' => \api\modules\v1\actions\user\ProfileAction::class,
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
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
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];
//        $actions['index']['dataFilter'] = [
//            'class' => \yii\data\ActiveDataFilter::class,
//            'filterAttributeName' => 'where',
//            'searchModel' => function () {
//                return (new \yii\base\DynamicModel(['id' => null, 'status' => null, 'nickname' => null,]))
//                    ->addRule('id', 'integer')
//                    ->addRule('status', 'integer')
//                    ->addRule('nickname', 'trim')
//                    ->addRule('nickname', 'string');
//            },
//            'filter' => ['status' => ($this->modelClass)::STATUS_ACTIVE],
//        ];

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
        $params = Yii::$app->getRequest()->getQueryParams();

        //查询 经历/昵称/编号
        $q = Yii::$app->getRequest()->getQueryParam('q', '');
        //0-全部 1-在线 2-不在线
        $online = Yii::$app->getRequest()->getQueryParam('online', 0);
        //0-default 1-经验丰富 2-咨询次数多 3-评价好 4-咨询单价低 5-咨询单价高
        $order = Yii::$app->getRequest()->getQueryParam('order', 0);

        $query = ($this->modelClass)::find()->select([])->where(['is_special'=>1,'status' => ($this->modelClass)::STATUS_ACTIVE]);

        $orderBy = ['id' => SORT_DESC];
        switch ($order) {
            case 0:
            case 1:
                $orderBy = ['experience_count' => SORT_DESC];
                break;
            case 2:
                $orderBy = ['help_count' => SORT_DESC];
                break;
            case 3:
                $orderBy = ['star' => SORT_DESC];
                break;
            case 4:
                $orderBy = ['price' => SORT_ASC];
                break;
            case 5:
                $orderBy = ['price' => SORT_DESC];
                break;
        }
        if (!empty($q)) {
            $idArr = $this->getUserIdsByQuery($q);
            if (empty($idArr)) {
                return [];
            }
            $query->andFilterWhere(['id' => $idArr]);
        }

        $dataProvider = Yii::createObject([
            'class' => ActiveDataProvider::className(),
            'query' => $query,
            'pagination' => [
                'params' => $params,
                'pageParam' => 'page',
                'pageSizeParam' => 'limit',
                'defaultPageSize' => 20,
            ],
            'sort' => [
                'defaultOrder' => $orderBy,
                'params' => $params,
            ],
        ]);

        return $dataProvider;
    }

    /**
     * 查询ID 昵称 经历
     * @param $query
     * @return array
     */
    public function getUserIdsByQuery($query)
    {
        $modelClass = $this->modelClass;
        if (is_numeric($query)) {
            $query = intval($query);
            $model = $modelClass::findOne(['id' => $query]);
            if (null !== $model) {
                return [$model->id];
            }
        }
        $list = $modelClass::find()->select(['id'])->where(['like', 'nickname', $query])->indexBy('id')->all();
        if (!empty($list)) {
            return array_keys($list);
        }
        $list = UserExperience::find()->select('uid')->where(['like', 'content', $query])->indexBy('uid')->all();
        if (!empty($list)) {
            return array_keys($list);
        }
        return [];
    }

    /**
     * @param $action
     * @param $result ActiveRecord
     * @return mixed
     */
    public function afterAction($action, $result)
    {
        if ('view' === $action->id) {//获取的是个人信息页面，那么该用户的访客数加1
            if (!Yii::$app->getUser()->getIsGuest() && $result) {
                $loginUserId = Yii::$app->getUser()->getIdentity()->getId();
                if ($loginUserId != $result->id) {
                    $result->updateCounters(['view_count' => 1]);
                    //$result->is_collected = UserCollect::isCollected($result->id, $loginUserId);
                }
            }
        }
        return parent::afterAction($action, $result); // TODO: Change the autogenerated stub
    }

}
