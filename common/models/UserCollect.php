<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%user_collect}}".
 *
 * @property int $id 自增用户id
 * @property int $uid 被收藏用户ID
 * @property int $c_uid 收藏人ID
 * @property string $remark 备注
 * @property int $created_at 创建时间
 * @property int $updated_at 最后修改时间
 */
class UserCollect extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_collect}}';
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
            [['uid', 'c_uid'], 'required'],
            [['uid', 'c_uid'], 'unique', 'targetAttribute' => ['uid', 'c_uid']],
            ['c_uid', 'compare', 'compareAttribute' => 'uid', 'operator' => '!='],
            [['uid', 'c_uid', 'created_at', 'updated_at'], 'integer'],
            [['remark'], 'string', 'max' => 255],
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
            'c_uid' => Yii::t('app', 'C Uid'),
            'remark' => Yii::t('app', 'Remark'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
