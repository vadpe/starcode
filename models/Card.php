<?php

namespace app\models;

use Yii;
use DateTime;

/**
 * This is the model class for table "card".
 *
 * @property integer $id
 * @property string $series
 * @property integer $number
 * @property string $create_date
 * @property string $expire_date
 * @property double $balance
 * @property integer $status
 */
class Card extends \yii\db\ActiveRecord
{
    const STATUS_NOT_ACTIVE             = 0;
    const STATUS_ACTIVE                 = 1;
    const STATUS_EXPIRED                = 2;

    public static $statusNames          = [
        self::STATUS_NOT_ACTIVE         => 'Не активирована',
        self::STATUS_ACTIVE             => 'Активирована',
        self::STATUS_EXPIRED            => 'Просрочена',
    ];

    /**
     * @inheritdoc
     */
    public function checkStatus() {
    
        if ($this->status !== self::STATUS_EXPIRED) {
            
            $expireDate     = (new DateTime($this->expire_date))->getTimestamp();
            $now            = (new DateTime('now'))->getTimestamp();
            
            if ($now > $expireDate) {
                $this->status = self::STATUS_EXPIRED;
                $this->update();
            }
        }
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'card';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['series', 'number', 'balance', 'status'], 'required'],
            [['number', 'status'], 'compare', 'compareValue' => 0, 'operator' => '>='],
            [['create_date', 'expire_date'], 'safe'],
            [['balance'], 'double'],
            [['series'], 'match', 'pattern' => '([a-z0-9]{3,})'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'            => 'Идентификатор карты в БД',
            'series'        => 'Серия',
            'number'        => 'Номер',
            'create_date'   => 'Дата выпуска',
            'expire_date'   => 'Дата окончания действия',
            'balance'       => 'Баланс',
            'status'        => 'Статус',
        ];
    }
}
