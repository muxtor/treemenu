<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Preg-replace::results';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        Еще есть варианты рещеный но я выполнил сторого по условию задание.
    </p>

    <code><?php
        $template = array('/\.00/'=>'','/(\d{1,9})\.(\d{1,2})[^1-9]/'=>'$1.$2');
        $cleaned = preg_replace(array_keys($template),array_values($template),array('55.10','55.01','50.01','55.00','50.00'));

        var_dump($cleaned);
        echo '</br>';
        print_r($cleaned);
 ?></code>
</div>
