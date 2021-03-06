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


class UserExperienceController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\UserExperience';
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
     * @SWG\Post(path="/user-experiences",
     *     tags={"experience"},
     *     summary="添加经历",
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
     *        description = "用户经历内容content",
     *        required = true,
     *        @SWG\Schema(ref="#/definitions/UserExperience"),
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
     * @SWG\Post(path="/user-experiences/{id}",
     *     tags={"experience"},
     *     summary="更新用户经历",
     *     description="返回成功信息",
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *        in = "path",
     *        name = "id",
     *        description = "经历ID",
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
     *        description = "用户经历内容content",
     *        required = true,
     *        @SWG\Schema(ref="#/definitions/UserExperience"),
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
     * @SWG\Post(path="/user-experiences/delete/{id}",
     *     tags={"experience"},
     *     summary="删除经历",
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
     *        description = "经历ID",
     *        required = true,
     *        type = "integer"
     *     ),
     *     @SWG\Parameter(
     *        in = "body",
     *        name = "body",
     *        description = "{}",
     *        required = true,
     *        @SWG\Schema(ref="#/definitions/UserExperience"),
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
     * @SWG\Get(path="/user-experiences",
     *     tags={"experience"},
     *     summary="获取用户的所有经历列表",
     *     description="返回用户经历列表",
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
     *        description = "要查询的用户ID",
     *        required = true,
     *        type = "integer"
     *     ),
     *     @SWG\Response(
     *         response = 200,
     *         description = " success",
     *         @SWG\Schema(ref="#/definitions/UserExperience"),
     *     )
     * )
     *
     */

    /**
     *
     * @SWG\Get(path="/user-experiences/{id}",
     *     tags={"experience"},
     *     summary="获取用户某一条经历",
     *     description="返回一条用户经历",
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
     *        description = "经历ID",
     *        required = true,
     *        type = "integer"
     *     ),
     *     @SWG\Response(
     *         response = 200,
     *         description = " success",
     *         @SWG\Schema(ref="#/definitions/UserExperience"),
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
//        $actions['index']['dataFilter'] = [
//            'class' => \yii\data\ActiveDataFilter::class,
//            'searchModel' => function () {
//                return (new \yii\base\DynamicModel(['id' => null, 'uid' => null, 'c_uid' => null, 'status' => null]))
//                    ->addRule('id', 'integer')
//                    ->addRule('status', 'integer')
//                    ->addRule('uid', 'integer')
//                    ->addRule('c_uid', 'integer');
//            },
//            'filter' => ['c_uid' => ],
//        ];

        return $actions;
    }

    public function prepareDataProvider()
    {
        $params = Yii::$app->getRequest()->getQueryParams();
        $uid = Yii::$app->getRequest()->get('uid', Yii::$app->getUser()->getIdentity()->getId());
        $where = ['uid'=>$uid];
        $query = ($this->modelClass)::find()->where($where);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'params' => $params,
                'pageParam' => 'page',
                'pageSizeParam' => 'limit',
                'defaultPageSize' => 20,
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_ASC,
                ],
                'params' => $params,
            ]
        ]);
        return $dataProvider;
    }

}
