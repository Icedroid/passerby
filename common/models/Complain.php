<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%complain}}".
 *
 * @property int $id 自增id
 * @property int $uid 被投诉的用户ID
 * @property int $complain_uid 投诉的用户ID
 * @property string $content 反馈内容
 * @property int $created_at 创建时间
 * @property int $updated_at 最后修改时间
 */
class Complain extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%complain}}';
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
            [['uid', 'complain_uid', 'created_at', 'updated_at'], 'integer'],
            [['content'], 'string'],
            [['uid'], 'required'],
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
            'complain_uid' => Yii::t('app', 'Complain Uid'),
            'content' => Yii::t('app', 'Content'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'uid']);
    }
}
