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


class FeedbackController extends ActiveController
{
    public $modelClass = 'api\modules\v1\models\Feedback';
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
     * @SWG\Post(path="/feedbacks",
     *     tags={"other"},
     *     summary="添加反馈",
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
     *        description = "内容content",
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
    public function actions()
    {
        $actions = parent::actions();
        //只保留create
        return [
          'create' => $actions['create'],
        ];
    }

}
