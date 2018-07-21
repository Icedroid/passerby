<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%consume}}".
 *
 * @property int $id 自增id
 * @property int $accept_uid 接受礼物的用户ID
 * @property int $send_uid 消费的用户ID
 * @property string $name 消费物品名称
 * @property int $price 消费的物品单价, 单位为分
 * @property int $amount 消费的物品数量
 * @property int $created_at 创建时间
 */
class Gift extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%gift}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
//        return [
//            \yii\behaviors\TimestampBehavior::className(),
//        ];
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
            [['accept_uid', 'send_uid', 'amount', 'created_at'], 'integer'],
            [['accept_uid', 'name','send_uid', 'price', 'amount'], 'required'],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 255],
            ['accept_uid', 'compare', 'compareAttribute' => 'send_uid', 'operator' => '!='],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'accept_uid' => Yii::t('app', 'Accept Uid'),
            'send_uid' => Yii::t('app', 'Send Uid'),
            'name' => Yii::t('app', 'Name'),
            'price' => Yii::t('app', 'Price'),
            'amount' => Yii::t('app', 'Amount'),
            'created_at' => Yii::t('app', 'Created At'),
        ];
    }
}
