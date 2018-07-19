<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%help}}".
 *
 * @property int $id 自增id
 * @property int $uid 用户ID
 * @property string $content 求助内容
 * @property int $is_emergency 是否紧急 0-否 1-是
 * @property int $is_pay 是否愿意付费 0-否 1-是
 * @property int $end_date 截止日期，如20180101
 * @property int $created_at 创建时间
 * @property int $updated_at 最后修改时间
 */
class Help extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%help}}';
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
            [['uid', 'is_emergency', 'is_pay', 'end_date', 'created_at', 'updated_at'], 'integer'],
            [['content'], 'required'],
            [['content'], 'string'],
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
            'content' => Yii::t('app', 'Content'),
            'is_emergency' => Yii::t('app', 'Is Emergency'),
            'is_pay' => Yii::t('app', 'Is Pay'),
            'end_date' => Yii::t('app', 'End Date'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }


    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'uid']);
    }

    public function getComments()
    {
        return $this->hasMany(HelpComment::className(), ['id' => 'help_id']);
    }
}
