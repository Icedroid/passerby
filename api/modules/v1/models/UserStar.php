<?php
/**
 * Author: lf
 * Blog: https://blog.feehi.com
 * Email: job@feehi.com
 * Created at: 2017-08-30 19:04
 */

namespace api\modules\v1\models;

use Yii;
use common\models\User;
use yii\helpers\ArrayHelper;
use yii\log\Logger;

class UserStar extends \common\models\UserStar
{

    public function fields()
    {
        $fields = parent::fields();
        unset($fields['uid'], $fields['updated_at'], $fields['understand'], $fields['help'], $fields['reason']);

        $fields['created_at'] = function ($model) {
            return date("Y-m-d", $model->created_at ? $model->created_at : time());
        };
        $fields['nickname'] = function ($model) {
            return $model->starUser->nickname;
        };
        $fields['avatar'] = function ($model) {
            return $model->starUser->avatar;
        };
        $fields['gender'] = function ($model) {
            return $model->starUser->gender;
        };
        $fields['education'] = function ($model) {
            return $model->starUser->education;
        };
        $fields['birthday'] = function ($model) {
            return date("Y-m-d", strtotime($model->starUser->birthday));
        };
        $fields['marriage'] = function ($model) {
            return $model->starUser->marriage;
        };
        return $fields;
    }

    public function beforeValidate()
    {
        if (!Yii::$app->getUser()->getIsGuest()) {
            $this->star_uid = Yii::$app->getUser()->getIdentity()->getId();
        }

        return parent::beforeValidate();
    }

    /**
     * 创建评价的时候启用事务
     * @return array
     */
    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_INSERT | self::OP_UPDATE,
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        if (!$insert) {//评分项有被修改，就要更新用户表的评分值
            $isChanged = false;
            $diff = 0;
            if (isset($changedAttributes['understand'])) {
                $diff += $this->understand - $changedAttributes['understand'];
                $isChanged = true;
            }
            if (isset($changedAttributes['help'])) {
                $diff += $this->help - $changedAttributes['help'];
                $isChanged = true;
            }
            if (isset($changedAttributes['reason'])) {
                $diff += $this->help - $changedAttributes['reason'];
                $isChanged = true;
            }

            if ($isChanged) {
                $user = User::findOne(['id' => $this->uid]);
                $user->star_count = $user->star_count ? $user->star_count : 1;
//                $newStarValue = $this->understand + $this->help + $this->reason + $diff;
                $totalStarValue = $user->star * ($user->star_count * self::STAR_MAX_VALUE);
                $maxStarValue = $user->star_count * self::STAR_MAX_VALUE;
                $user->star = ($diff + $totalStarValue) / $maxStarValue;

                $user->save(false);
            }
        } else {//事务中同步更新用户的被评分次数和评分值
            $user = User::findOne(['id' => $this->uid]);

            $newStarValue = $this->understand + $this->help + $this->reason;
            $totalStarValue = $user->star * ($user->star_count * self::STAR_MAX_VALUE);
            $maxStarValue = ($user->star_count + 1) * self::STAR_MAX_VALUE;
//            $user->star = number_format(($newStarValue + $totalStarValue) / $maxStarValue, 4);
            $user->star = ($newStarValue + $totalStarValue) / $maxStarValue;
            $user->star_count += 1;
            $user->save(false);
//            if($user->hasErrors()){
//                Yii::error(ArrayHelper::toArray($user->getErrors()));
//            }
        }

        parent::afterSave($insert, $changedAttributes); // TODO: Change the autogenerated stub
    }
}