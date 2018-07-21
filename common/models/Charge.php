<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%charge}}".
 *
 * @property int $id 自增id
 * @property int $uid 用户ID
 * @property string $out_trade_no 订单号
 * @property string $transaction_id 微信订单号
 * @property string $body 描述
 * @property int $total_fee 金额
 * @property string $spbill_create_ip 用户IP
 * @property int $status 状态 0-未支付 1-支付成功 2-支付失败
 * @property int $paid_at 支付时间
 * @property int $created_at 创建时间
 * @property int $updated_at 最后修改时间
 */
class Charge extends \yii\db\ActiveRecord
{
    const STATUS_UNPAID = 0; //未支付
    const STATUS_PAY_SUCCESS = 1; //已支付
    const STATUS_PAY_FAIL = 2; //支付失败
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%charge}}';
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
            [['uid', 'total_fee', 'status', 'paid_at', 'created_at', 'updated_at'], 'integer'],
            [['uid', 'total_fee'], 'required'],
            [['out_trade_no', 'transaction_id'], 'string', 'max' => 32],
            [['body'], 'string', 'max' => 255],
            [['spbill_create_ip'], 'string', 'max' => 20],
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
            'out_trade_no' => Yii::t('app', 'Out Trade No'),
            'transaction_id' => Yii::t('app', 'Transaction ID'),
            'body' => Yii::t('app', 'Body'),
            'total_fee' => Yii::t('app', 'Total Fee'),
            'spbill_create_ip' => Yii::t('app', 'Spbill Create Ip'),
            'status' => Yii::t('app', 'Status'),
            'paid_at' => Yii::t('app', 'Paid At'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }
}
