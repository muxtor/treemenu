<?php
use yii\helpers\Html;
/**
 * Created by PhpStorm.
 * User: Ulugbek
 * Date: 22.06.2017
 * Time: 21:41
 */?>
<div class="treemenu">
    <h3>Treemenu no design</h3>
    <ul>
        <?php if($menus!=null){ ?>
            <?php foreach ($menus as $menu){ ?>
                <li>
                    <?= Html::a($menu->title,$menu->link) ?>
                    <?=$menu->menusubs($menu->id);?>
                </li>
            <?php } ?>
        <?php }else{ ?>
            <li>Пока нет меню, пожалуйста добавить меню <a href="/treemenu/create">тут</a></li>
        <?php } ?>
    </ul>
</div>
