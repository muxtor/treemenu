<?php
namespace app\widgets;
/**
 * Created by PhpStorm.
 * User: Ulugbek
 * Date: 22.06.2017
 * Time: 21:36
 */
class TreemenuWidget extends \yii\bootstrap\Widget{
    public function run()
    {
        $menus = \app\models\Treemenu::find()->where(['IS','parent',null])->all();
        return $this->render('treemenu', [
            'menus'=>$menus
        ]);

    }
}