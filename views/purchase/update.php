<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Purchase */

$this->title = 'Редактировать покупку: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Покупки', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Сохранить';
?>
<div class="purchase-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
