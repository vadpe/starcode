<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;
use app\models\Card;

/**
 * ContactForm is the model behind the contact form.
 */
class GeneratorForm extends Model
{
    const DURATION_ONE_YEAR             = 0;
    const DURATION_SIX_MONTH            = 1;
    const DURATION_ONE_MONTH            = 2;

    public static $durationNames          = [
        self::DURATION_ONE_YEAR         => '1 год',
        self::DURATION_SIX_MONTH        => '6 месяцев',
        self::DURATION_ONE_MONTH        => '1 месяц',
    ];    
    
    public $series;
    public $count;
    public $duration;
    
    /**
     * 
     */
    public function createCards() {
        
        if ($this->validate()) {
            
            $id = 0;
            $ser = $this->series;
            $num = $this->count;
            $crt = date('Y-m-d H:i:s', strtotime('now'));
            switch ($this->duration) {

                case self::DURATION_SIX_MONTH:
                    $exp = date('Y-m-d H:i:s', strtotime('+6 month'));
                    break;
                
                case self::DURATION_ONE_MONTH:
                    $exp = date('Y-m-d H:i:s', strtotime('+1 month'));
                    break;
                
                default:
                    $exp = date('Y-m-d H:i:s', strtotime('+1 year'));
                    break;                
                    
            }
            $bal = 100.0;
            $sts = Card::STATUS_ACTIVE;
            
            $sql = 'INSERT INTO ' . Card::tableName() . ' VALUES ';
            for ($i = 1; $i <= $num; $i++) {
                $sql .= '(' .
                     $id . ',' .
                    '\''.$ser.'\'' . ',' .
                    $i . ',' .
                    '\''.$crt.'\'' . ',' .
                    '\''.$exp.'\'' . ',' .
                    $bal . ',' .
                    $sts . ')';
             
                if ($i < $num) {
                    $sql .= ',';
                }
            }
            
            ActiveRecord::findBySql($sql)
                ->createCommand()
                ->execute();

            /*$connection = Yii::$app->db;
            $command = $connection->createCommand('CALL create_cards(:ser, :num, :crt, :exp, :bal, :sts)');
            $command->bindParam(':ser', $ser);
            $command->bindParam(':num', $num);
            $command->bindParam(':crt', $crt);
            $command->bindParam(':exp', $exp);
            $command->bindParam(':bal', $bal);
            $command->bindParam(':sts', $sts);
            $command->execute();*/
        }
    }
    
    /**
     * 
     */
    public function deleteCards() {
        Card::deleteAll();
        
        $sql = 'ALTER TABLE ' . Card::tableName() . ' AUTO_INCREMENT=0';
        ActiveRecord::findBySql($sql)
            ->createCommand()
            ->execute();
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['series', 'count', 'duration'], 'required'],
            [['count'], 'compare', 'compareValue' => 0, 'operator' => '>'],
            [['series'], 'match', 'pattern' => '([a-z0-9]{3,})'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'series'        => 'Серия',
            'count'         => 'Количество карт',
            'duration'      => 'Срок окончания активности',
        ];
    }
}
