<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use app\models\Card;

/* @var $this yii\web\View */
/* @var $model app\models\Card */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Карты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'series',
            'number',
            'create_date',
            'expire_date',
            'balance',
			[
				'label'		=> $model->attributeLabels()['status'],
				'value'		=> Card::$statusNames[$model->status],
			],
        ],
    ]) ?>
    
    <h1> <?= Html::encode('Покупки') ?></h1>
        
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'card_id',
            'date',
            'cost',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>    

</div>
