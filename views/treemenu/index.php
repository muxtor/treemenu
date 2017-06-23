<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel app\models\TreemenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Treemenus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="treemenu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Treemenu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'link',
            //'parent',
            //'order',
            // 'is_active',
            [
                'label'=>'Add sub',
                'format'=>'raw',
                'value'=>function($model) {
                    return Html::a('<span class="glyphicon glyphicon-plus"></span>',Url::to(['/treemenu/create','parent'=>$model->id]));
                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
        'afterRow' => function($model, $key, $index) {
            return $model->subs($model->id);
        },
    ]); ?>
<?php Pjax::end(); ?></div>
