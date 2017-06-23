<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Treemenu */

$this->title = 'Create Treemenu';
$this->params['breadcrumbs'][] = ['label' => 'Treemenus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="treemenu-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
