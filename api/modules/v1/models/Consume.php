<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-08-30 19:04
 */

namespace api\modules\v1\models;

use Yii;

class Consume extends \common\models\Consume
{
    public function fields()
    {
        return [
            'desc' => function ($model) {
                return self::$typeDesc[$model->type];
            },
            'money' => function ($model) {
                return self::$typePrefix[$model->type] . intval($model->money / 100);
            },
            'created_at' => function ($model) {
                return date("Y-m-d H:i:s", $model->created_at);
            },
        ];
    }

    public static function addRow($uid, $money, $type)
    {
        $consume = new Consume();
        $consume->uid = $uid;
        $consume->money = $money;
        $consume->type = $type;
        $consume->save(false);
    }
}