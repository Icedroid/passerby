<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-07-09 00:59
 */

namespace common\helpers;

use yii\web\HttpException;
use yii\web\ServerErrorHttpException;

class ResponseHelper extends \yii\helpers\ArrayHelper
{

    public static function apiResult($message, $code=422)
    {
        throw new HttpException($code, $message);
    }

    public static function busy()
    {
        throw new HttpException(500, '系统异常，请稍后再试');
    }
}