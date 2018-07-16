<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%user_experience}}".
 *
 * @property int $id 自增用户id
 * @property int $uid 用户ID
 * @property string $content 经历描述
 * @property int $start_date 开始日期
 * @property int $end_date 结束日期
 */
class UserExperience extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user_experience}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'start_date', 'end_date'], 'integer'],
            [['uid', 'content'], 'required'],
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
            'start_date' => Yii::t('app', 'Start Date'),
            'end_date' => Yii::t('app', 'End Date'),
        ];
    }
}
