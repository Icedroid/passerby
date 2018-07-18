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


class HelpCommentController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\HelpComment';
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
     * @SWG\Post(path="/help-comments",
     *     tags={"help"},
     *     summary="添加求助评论",
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
     *        description = "用户求助评论内容content",
     *        required = true,
     *        @SWG\Schema(ref="#/definitions/HelpComment"),
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
     * @SWG\Post(path="/help-comments/{id}",
     *     tags={"help"},
     *     summary="更新求助评论",
     *     description="返回成功信息",
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *        in = "path",
     *        name = "id",
     *        description = "求助评论ID",
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
     *        description = "求助评论内容content",
     *        required = true,
     *        @SWG\Schema(ref="#/definitions/HelpComment"),
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
     * @SWG\Post(path="/help-comments/delete/{id}",
     *     tags={"help"},
     *     summary="删除求助评论",
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
     *        description = "求助评论ID",
     *        required = true,
     *        type = "integer"
     *     ),
     *     @SWG\Parameter(
     *        in = "body",
     *        name = "body",
     *        description = "{}",
     *        required = true,
     *        @SWG\Schema(ref="#/definitions/HelpComment"),
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
     * @SWG\Get(path="/help-comments",
     *     tags={"help"},
     *     summary="获取用户的所有求助评论列表",
     *     description="返回求助评论列表",
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
     *        name = "where[help_id]",
     *        description = "传求助帖子ID，获取某个求助帖子的评论列表",
     *        required = false,
     *        type = "integer"
     *     ),
     *     @SWG\Response(
     *         response = 200,
     *         description = " success",
     *         @SWG\Schema(ref="#/definitions/HelpComment"),
     *     )
     * )
     *
     */

    /**
     *
     * @SWG\Get(path="/help-comments/{id}",
     *     tags={"help"},
     *     summary="获取用户某一条求助评论",
     *     description="返回一条求助评论",
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
     *        description = "求助评论ID",
     *        required = true,
     *        type = "integer"
     *     ),
     *     @SWG\Response(
     *         response = 200,
     *         description = " success",
     *         @SWG\Schema(ref="#/definitions/HelpComment"),
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
        $actions['index']['dataFilter'] = [
            'class' => \yii\data\ActiveDataFilter::class,
            'filterAttributeName'=>'where',
            'searchModel' => function () {
                return (new \yii\base\DynamicModel(['id' => null, 'uid' => null, 'help_id' => null]))
                    ->addRule('id', 'integer')
                    ->addRule('uid', 'integer')
                    ->addRule('help_id', 'integer');
            },
//            'filter' => ['c_uid' => Yii::$app->getUser()->getIdentity()->getId()],
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

        $where = ['uid'=>Yii::$app->getUser()->getIdentity()->getId()];
        $query = $modelClass::find()->select(['{{help_comment}}.*','{{user}}.nickname','{{user}}.avatar'])
            ->where($where)
            ->joinWith('user');
        if (!empty($filter)) {
//            if(!$filter->c_uid){
//                $query->addFilterWhere('c_uid'=>Yii::$app->getUser()->getIdentity()->getId());
//            }
            $query->andWhere($filter);
        }


        $dataProvider = Yii::createObject([
            'class' => ActiveDataProvider::className(),
            'query' => $query,
            'pagination' => [
                'params' => $requestParams,
                'pageParam'=> 'page',
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
