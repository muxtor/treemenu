<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Treemenu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="treemenu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?php if(isset($_GET['parent']) AND !empty($_GET['parent'])){
        $model->parent = (int)$_GET['parent']; ?>
        <?= $form->field($model, 'parent')->hiddenInput()->label(false) ?>
    <?php }else{ ?>
        <?= $form->field($model, 'parent')->dropDownList(\yii\helpers\ArrayHelper::map(@app\models\Treemenu::find()->all(),'id','title'),['prompt'=>'Select parent menu']) ?>
    <?php }?>

    <?php //= $form->field($model, 'order')->textInput() ?>

    <?php //= $form->field($model, 'is_active')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
