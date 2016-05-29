<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Purchase */

$this->title = 'Создать покупку';
$this->params['breadcrumbs'][] = ['label' => 'Покупки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchase-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
