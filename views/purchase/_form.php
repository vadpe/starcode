<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use \yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model app\models\Purchase */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="purchase-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'card_id')->widget(MaskedInput::className(), ['mask' => '9[99999999]']) ?>

    <?= $form->field($model, 'date')->widget(MaskedInput::className(), ['mask' => '9999-99-99 99:99:99']) ?>

    <?= $form->field($model, 'cost')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
