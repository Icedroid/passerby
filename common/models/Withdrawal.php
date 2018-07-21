<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%withdrawal}}".
 *
 * @property int $id 自增id
 * @property int $uid 用户ID
 * @property string $partner_trade_no 商户订单号
 * @property string $desc 描述
 * @property int $amount 企业付款金额，单位为分
 * @property int $created_at 创建时间
 * @property int $updated_at 最后修改时间
 */
class Withdrawal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%withdrawal}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => null,
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['uid', 'amount', 'created_at'], 'integer'],
            [['uid', 'amount'], 'required'],
            [['partner_trade_no'], 'string', 'max' => 32],
            [['desc'], 'string', 'max' => 255],
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
            'partner_trade_no' => Yii::t('app', 'Partner Trade No'),
            'desc' => Yii::t('app', 'Desc'),
            'amount' => Yii::t('app', 'Amount'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }
}
