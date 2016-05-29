<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\GeneratorForm;
use \yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CardSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Генератор карт';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card-index">

    <?php $form = ActiveForm::begin(); ?>
    
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $form->field($model, 'series')->textInput(['value' => 'xyz']) ?>
    
    <?= $form->field($model, 'count')->textInput(['value' => 10000]) ?>
    
    <?= $form->field($model, 'duration')->dropDownList(GeneratorForm::$durationNames) ?>

    <div class="form-group">
        <?php echo Html::submitButton('Создать карты', ['name' => 'create', 'class' => 'btn btn-success']) ?>
        <?php echo Html::submitButton('Удалить все карты', ['name' => 'delete', 'class' => 'btn btn-primary']) ?>
    </div>
    
    <?php ActiveForm::end(); ?>

</div>
