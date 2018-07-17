<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-08-30 18:10
 */

namespace api\modules\v1\controllers;

use api\modules\v1\models\User;
use common\helpers\ResponseHelper;
use Yii;
use yii\helpers\ArrayHelper;
use yii\rest\Controller;
use yii\rest\CreateAction;
use yii\web\Response;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\QueryParamAuth;
use yii\filters\auth\HttpBearerAuth;
use api\modules\v1\models\form\LoginForm;
use yii\web\ServerErrorHttpException;


class DefaultController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;//默认浏览器打开返回json
//        $behaviors['authenticator'] = [
//            'class' => CompositeAuth::className(),
//            'authMethods' => [
////                HttpBasicAuth::className(),
//                HttpBearerAuth::className(),
//                QueryParamAuth::className(),
////                [
////                    'class' => QueryParamAuth::className(),
////                    'tokenParam'=>'access_token',//修改query的参数名
////                ],
//            ],
//            'only' => [
////               'index', 'experience','feedback'
//            ],
//        ];

        return $behaviors;
    }

    public function actionIndex()
    {
        return [
            "api service"
        ];
    }

    /**
     * 微信小程序 wx.Login 微信登录时调用的接口
     *
     * @SWG\Get(path="/session-key",
     *     tags={"user"},
     *     summary="获取用户的auth_key",
     *     description="微信小程序 wx.Login 微信登录时调用的接口传jsCode",
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *        in = "query",
     *        name = "code",
     *        description = "jsCode",
     *        required = true,
     *        type = "string"
     *     ),
     *     @SWG\Response(
     *         response = 200,
     *         description = " success",
     *         @SWG\Schema(ref="#/definitions/Error"),
     *     )
     * )
     *
     *
     */
    public function actionSessionKey($code)
    {
        if(!$code){
            return ResponseHelper::apiResult("通信错误，请在微信重新发起请求");
        }

        try{
            $app = Yii::$app->wechat->miniProgram;
            $oauth = $app->auth->session($code);

//            $oauth = array('session_key'=>'test', 'openid'=>'test');
            if($oauth && isset($oauth['errcode']) && isset($oauth['errmsg'])){
                return ResponseHelper::apiResult($oauth['errmsg']);
            }

            //缓存数据
            $auth_key = Yii::$app->security->generateRandomString().'_'.time();
            Yii::$app->cache->set($auth_key, ArrayHelper::toArray($oauth), 7195);

            return [
                'auth_key'=>$auth_key,
            ];
        }catch (\Exception $e){
            return ResponseHelper::apiResult($e->getMessage());
        }

    }

    /**
     * 用户登录接口
     * @SWG\Post(path="/login",
     *     tags={"user"},
     *     summary="用户登录",
     *     description="返回用户信息",
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *        in = "body",
     *        name = "body",
     *        description = "微信信息+auth_key的整个json作为内容体",
     *        required = true,
     *        @SWG\Schema(ref="#/definitions/Login"),
     *     ),
     *     @SWG\Response(
     *         response = 200,
     *         description = " success"
     *     )
     * )
     *
     * @return User|array|null|void|\yii\web\IdentityInterface
     * @throws ServerErrorHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionLogin()
    {
        $loginForm = new LoginForm();

        $loginForm->load(Yii::$app->request->post(), '');

        $model = User::findIdentityByAccessToken($loginForm->auth_key);
        if (NULL === $model) {
            $model = new User();
            if($model->setAttributesByLoginForm($loginForm)){
                if ($model->save()) {
//                    return ["access_token" => $model->auth_key];
                    return $model;
                } elseif ($model->hasErrors()) {
                    return $model;
                }else{
                    throw new ServerErrorHttpException('Failed to create the object for unknown reason.');
                }
            }elseif ($model->hasErrors()) {
                return $model;
            }
        } else {
            if($model->setAttributesByLoginForm($loginForm)){
                if ($model->update(false) !== false) {    // update successful
//                    $model->updateCounters(['login_count'=>1]);
                    return $model;
                } elseif ($model->hasErrors()) {
                    return $model;
                } else {// update failed
                    throw new ServerErrorHttpException('Failed to update the object for unknown reason.');

                }
            }elseif ($model->hasErrors()) {
                return $model;
            }
        }

    }

}
