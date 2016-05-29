<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Card;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Карты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать карту', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'series',
            'number',
            'create_date',
            'expire_date',
            // 'balance',
            [
                'attribute'			=> 'status',
                'filter'			=> Card::$statusNames,
                'content'			=> 
                function($model) {
                    $model->checkStatus();
                    return Card::$statusNames[$model->status];
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
