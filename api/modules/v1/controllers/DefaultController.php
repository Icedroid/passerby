<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-08-30 18:10
 */

namespace api\modules\v1\controllers;

use Yii;
use yii\rest\Controller;
use yii\rest\CreateAction;
use yii\web\Response;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\QueryParamAuth;
use yii\filters\auth\HttpBearerAuth;
use api\modules\v1\models\CarAgency;
use api\modules\v1\models\form\LoginForm;
use yii\web\ServerErrorHttpException;
use api\modules\v1\models\CarFeedback;
use api\modules\v1\models\CarExperience;


class DefaultController extends Controller
{
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
                'experience','feedback'
            ],
        ];

        return $behaviors;
    }

    public function actionIndex()
    {
        return [
            "api service"
        ];
    }

    /**
     * 用户登录接口
     *
     * @SWG\Post(path="/login",
     *     tags={"api"},
     *     summary="用户登录",
     *     description="返回 access_token",
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *        in = "body",
     *        name = "body",
     *        description = "用户信息的整个json作为内容体",
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
    public function actionLogin()
    {
        $loginForm = new LoginForm();

        $loginForm->load(Yii::$app->getRequest()->getBodyParams(), '');

        $model = CarAgency::findByAccountCode($loginForm->accountCode);
        if (NULL === $model) {
            $model = new CarAgency();
            $model->setAttributesByLoginForm($loginForm);
            $model->login_count = 1;
            $model->last_login_time = time();
            if ($model->save()) {
                return ["access_token" => $model->access_token];
            } elseif ($model->hasErrors()) {
                return $model;
            }else{
                throw new ServerErrorHttpException('Failed to create the object for unknown reason.');
            }
        } else {
            $model->setAttributesByLoginForm($loginForm);
            $model->last_login_time = time();
            if ($model->update(false) !== false) {    // update successful
                $model->updateCounters(['login_count'=>1]);
                return ["access_token" => $model->access_token];
            } elseif ($model->hasErrors()) {
                return $model;
            } else {// update failed
                throw new ServerErrorHttpException('Failed to update the object for unknown reason.');

            }
        }
    }

    /**
     * 启动获取配置信息接口
     *
     * @SWG\Get(path="/config",
     *     tags={"api"},
     *     summary="获取配置信息",
     *     description="应用所有在服务端保存的信息都由此接口返回",
     *     produces={"application/json"},
     *
     *     @SWG\Response(
     *         response = 200,
     *         description = "success"
     *     )
     * )
     *
     * @return
     */
    public function actionConfig()
    {
        $config = Yii::$app->params['phoneConfig'];
        $startup = [];
        if (isset($config['startup'])) {
            foreach ($config['startup'] as $img) {
                $startup[] = Yii::$app->request->hostInfo . DIRECTORY_SEPARATOR . ltrim($img, DIRECTORY_SEPARATOR);
            }
            $config['startup'] = $startup;
        }
        return $config;
    }

    /**
     * 上传车型体验记录接口
     * @SWG\Post(path="/experience",
     *     tags={"api"},
     *     summary="上传车型体验记录",
     *     description="请使用表单或json形式提交数据",
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
     *        description = "体验记录的json格式内容体",
     *        required = true,
     *        @SWG\Schema(ref="#/definitions/Experience"),
     *     ),
     *     @SWG\Response(
     *         response = 200,
     *         description = " success"
     *     ),
     *     @SWG\Response(
     *         response = 401,
     *         description = "需要重新登陆",
     *         @SWG\Schema(ref="#/definitions/Error")
     *     )
     * )
     *
     * @return
     */
    public function actionExperience()
    {
        $model = new CarExperience();

        $model->load(Yii::$app->getRequest()->getBodyParams(), '');
        if ($model->save()) {
//            $response = Yii::$app->getResponse();
//            $response->setStatusCode(201);
//            $id = implode(',', array_values($model->getPrimaryKey(true)));
//            $response->getHeaders()->set('Location', Url::toRoute([$this->viewAction, 'id' => $id], true));
        }elseif ($model->hasErrors()){
            return $model;
        } else {
            throw new ServerErrorHttpException('Failed to create the object for unknown reason.');
        }

        return [];
    }

    /**
     * 用户反馈接口
     * @SWG\Post(path="/feedback",
     *     tags={"api"},
     *     summary="用户反馈接口",
     *     description="请使用表单形式提交数据",
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *        in = "query",
     *        name = "access-token",
     *        description = "access-token",
     *        required = true,
     *        type = "string"
     *     ),
     *     @SWG\Parameter(
     *        in = "formData",
     *        name = "content",
     *        description = "反馈内容",
     *        required = true,
     *        type = "string"
     *     ),
     *     @SWG\Parameter(
     *        in = "formData",
     *        name = "image",
     *        description = "图片url数组",
     *        required = true,
     *        type = "string"
     *     ),
     *     @SWG\Response(
     *         response = 200,
     *         description = "success"
     *     ),
     *     @SWG\Response(
     *         response = 401,
     *         description = "需要重新登陆",
     *         @SWG\Schema(ref="#/definitions/Error")
     *     )
     * )
     *
     * @return
     */
    public function actionFeedback()
    {
//        return (new CreateAction($this->action->id, $this->id, [
//            'modelClass' => 'api\modules\v1\models\CarFeedback'
//        ]))->run();

        /* @var $model \yii\db\ActiveRecord */
        $model = new CarFeedback();

        $model->load(Yii::$app->getRequest()->getBodyParams(), '');
        if ($model->save()) {
//            $response = Yii::$app->getResponse();
//            $response->setStatusCode(201);
//            $id = implode(',', array_values($model->getPrimaryKey(true)));
//            $response->getHeaders()->set('Location', Url::toRoute([$this->viewAction, 'id' => $id], true));
        }elseif ($model->hasErrors()){
            return $model;
        } else {
            throw new ServerErrorHttpException('Failed to create the object for unknown reason.');
        }

        return [];
    }

}
