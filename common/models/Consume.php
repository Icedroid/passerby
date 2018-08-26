<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%consume}}".
 *
 * @property int $id 自增id
 * @property int $uid 用户ID
 * @property int $money 消费金额，单位为分
 * @property int $type 类型 0-充值 1-提款 2-送出礼物 3-收到礼物
 * @property int $created_at 创建时间
 */
class Consume extends \yii\db\ActiveRecord
{
    const TYPE_CHARGE = 0; //充值
    const TYPE_WITHDRAWAL = 1; //提现
    const TYPE_SEND_GIFT = 2; //打赏 即送出礼物
    const TYPE_ACCEPT_GIFT = 3; //收到打赏 即接受礼物

    public static $typeDesc = [
      self::TYPE_CHARGE=>'充值',
      self::TYPE_WITHDRAWAL=>'提现',
      self::TYPE_SEND_GIFT=>'打赏',
      self::TYPE_ACCEPT_GIFT=>'收到打赏',
    ];

    public static $typePrefix = [
        self::TYPE_CHARGE=>'',
        self::TYPE_WITHDRAWAL=>'-',
        self::TYPE_SEND_GIFT=>'-',
        self::TYPE_ACCEPT_GIFT=>'',
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%consume}}';
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
            [['uid', 'money', 'type', 'created_at'], 'integer'],
            [['uid', 'money'], 'required'],
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
            'money' => Yii::t('app', 'Money'),
            'type' => Yii::t('app', 'Type'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }
}
