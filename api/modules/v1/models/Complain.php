<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-08-30 19:04
 */

namespace api\modules\v1\models;

use Yii;
use common\helpers\Util;

class Complain extends \common\models\Complain
{

    public function fields()
    {
        $fields = parent::fields();
        unset($fields['created_at'], $fields['updated_at']);

        $fields['nickname'] = function ($model) {
            return $model->user->nickname;
        };
        $fields['avatar'] = function ($model) {
            return Util::getFileRightUrl($model->user->avatar);
        };
        return $fields;
    }

    public function beforeValidate()
    {
        if(!Yii::$app->getUser()->getIsGuest()){
            $this->complain_uid = Yii::$app->getUser()->getIdentity()->getId();
        }
        return parent::beforeValidate();
    }

    /**
     * uid 是否被$complainUid收藏了
     * @param $uid
     * @param $collectUid
     */
    public static function isComplained($uid, $complainUid)
    {
        $model = self::findOne(['uid'=>$uid, 'complain_uid'=>$complainUid]);
        return $model !== NULL;
    }
}