<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%user_star}}".
 *
 * @property int $id 自增id
 * @property int $uid 被评分用户ID
 * @property int $star_uid 评分用户ID
 * @property string $content 内容
 * @property int $understand 理解得分，值为1-5
 * @property int $help 有帮助得分，值为1-5
 * @property int $reason 靠谱得分，值为1-5
 * @property int $created_at 创建时间
 * @property int $updated_at 最后修改时间
 */
class UserStar extends \yii\db\ActiveRecord
{
    const STAR_MAX_VALUE = 15;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_star}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'star_uid', 'understand', 'help', 'reason', 'created_at', 'updated_at'], 'integer'],
            [['content'], 'required'],
            [['content'], 'string'],
            ['understand', 'in', 'range' => [1, 2, 3, 4, 5]],
            ['help', 'in', 'range' => [1, 2, 3, 4, 5]],
            ['reason', 'in', 'range' => [1, 2, 3, 4, 5]],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'uid' => Yii::t('app', 'Uid'),
            'star_uid' => Yii::t('app', 'Star Uid'),
            'content' => Yii::t('app', 'Content'),
            'understand' => Yii::t('app', 'Understand'),
            'help' => Yii::t('app', 'Help'),
            'reason' => Yii::t('app', 'Reason'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
