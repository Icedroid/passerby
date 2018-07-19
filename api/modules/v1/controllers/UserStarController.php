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


class UserStarController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\UserStar';
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
     * @SWG\Post(path="/user-stars",
     *     tags={"star"},
     *     summary="创建评价",
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
     *        name = "body",
     *        description = "用户评分content",
     *        required = true,
     *        @SWG\Schema(ref="#/definitions/UserStar"),
     *     ),
     *     @SWG\Response(
     *         response = 200,
     *         description = " success"
     *     )
     * )
     *
     * @SWG\Get(path="/user-stars",
     *     tags={"star"},
     *     summary="获取用户的所有评分人的列表",
     *     description="返回用户被多少人评价过的列表",
     *     produces={"application/json"},
     *    @SWG\Parameter(
     *        in = "query",
     *        name = "access-token",
     *        description = "access-token",
     *        required = true,
     *        type = "string"
     *     ),
     *     @SWG\Parameter(
     *        in = "query",
     *        name = "uid",
     *        description = "被评价的用户ID",
     *        required = true,
     *        type = "integer"
     *     ),
     *     @SWG\Response(
     *         response = 200,
     *         description = " success",
     *         @SWG\Schema(ref="#/definitions/UserStar"),
     *     )
     * )
     *
     */
    public function actions()
    {
        $actions = parent::actions();
        //只用到create
        $actions = [
            'index' => $actions['index'],
            'create' => [
                'class' => '\api\modules\v1\actions\user\StarAction',
                'modelClass' => $this->modelClass,
                'checkAccess' => [$this, 'checkAccess'],
                'scenario' => $this->createScenario,
            ],
        ];
        // 使用"prepareDataProvider()"方法自定义数据provider
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

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
        /* @var $modelClass \yii\db\BaseActiveRecord */
        $modelClass = $this->modelClass;
        $uid = Yii::$app->getRequest()->get('uid', Yii::$app->getUser()->getIdentity()->getId());
        $where = ['uid'=>$uid];
        return $modelClass::find()->select(['{{user_star}}.*','{{user}}.nickname','{{user}}.avatar', '{{user}}.gender', '{{user}}.birthday',
            '{{user}}.education', '{{user}}.marriage'])->where($where)
            ->joinWith('starUser')
            ->limit(100)
            ->orderBy([
                'id' => SORT_ASC,
            ])
//            ->asArray();
            ->all();
    }
}
