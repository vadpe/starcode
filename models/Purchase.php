<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "purchase".
 *
 * @property integer $id
 * @property integer $card_id
 * @property string $date
 * @property double $cost
 */
class Purchase extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'purchase';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['card_id', 'cost'], 'required'],
            [['card_id'], 'integer'],
            [['date'], 'safe'],
            [['cost'], 'double'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'        => 'Идентификатор покупки в БД',
            'card_id'   => 'Идентификатор карты',
            'date'      => 'Дата покупки',
            'cost'      => 'Стоимость',
        ];
    }
}
