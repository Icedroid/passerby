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


class UserCollectController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\UserCollect';
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
     *
     * @SWG\Post(path="/user-collects",
     *     tags={"user"},
     *     summary="收藏用户",
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
     *        description = "被收藏的用户id和备注",
     *        required = true,
     *        @SWG\Schema(ref="#/definitions/UserCollect"),
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
     * @SWG\Post(path="/user-collects/{id}",
     *     tags={"user"},
     *     summary="更新收藏的备注",
     *     description="返回成功信息",
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *        in = "path",
     *        name = "id",
     *        description = "收藏ID",
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
     *        description = "收藏的用户备注",
     *        required = true,
     *        @SWG\Schema(ref="#/definitions/UserCollect"),
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
     * @SWG\Get(path="/user-collects",
     *     tags={"user"},
     *     summary="获取用户的所有收藏用户列表",
     *     description="返回收藏用户列表",
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
     *         @SWG\Schema(ref="#/definitions/UserCollect"),
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
        $where = ['c_uid' => Yii::$app->getUser()->getIdentity()->getId()];
        $query = ($this->modelClass)::find()->where($where);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                    'id' => SORT_DESC,
                ]
            ]
        ]);
        return $dataProvider;
    }

    /**
     * {@inheritdoc}
     */
    protected function verbs()
    {
        return [
            'index' => ['GET', 'HEAD'],
            'view' => ['GET', 'HEAD'],
            'create' => ['POST'],
            'update' => ['POST'],
        ];
    }

}
