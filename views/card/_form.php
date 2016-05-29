<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Card;
use \yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\Card */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="card-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'series')->widget(MaskedInput::className(), ['mask' => '*{3,}']) ?>

    <?= $form->field($model, 'number')->widget(MaskedInput::className(), ['mask' => '9[99999999]']) ?>

    <?= $form->field($model, 'create_date')->widget(MaskedInput::className(), ['mask' => '9999-99-99 99:99:99']) ?>

    <?= $form->field($model, 'expire_date')->widget(MaskedInput::className(), ['mask' => '9999-99-99 99:99:99']) ?>

    <?= $form->field($model, 'balance')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(Card::$statusNames) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
