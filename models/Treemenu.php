<?php

namespace app\models;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * This is the model class for table "{{%treemenu}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $link
 * @property integer $parent
 * @property integer $order
 * @property integer $is_active
 */
class Treemenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%treemenu}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'link'], 'required'],
            [['parent', 'order', 'is_active'], 'integer'],
            [['title', 'link'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'link' => 'Link',
            'parent' => 'Parent',
            'order' => 'Order',
            'is_active' => 'Is Active',
        ];
    }

    /** subs for admin */
    public function subs($id,$tree='-'){
        $subs = self::find()->where(['parent'=>$id])->all();
        $subed = '';
        if($subs!=null){
            foreach ($subs as $sub){

                $subed .= '<tr data-key="'.$sub->id.'"><td>'.$sub->id.'</td><td>|'.$tree.' '.$sub->title.'</td><td>'.$sub->link.'</td>
                <td>'.Html::a('<span class="glyphicon glyphicon-plus"></span>',Url::to(['/treemenu/create','parent'=>$sub->id])).'</td>
                <td>'.Html::a('<span class="glyphicon glyphicon-eye-open"></span>',Url::to(['/treemenu/view','id'=>$sub->id]),['title'=>'View','aria-label'=>'View','data-pjax'=>'0']).' 
                '.Html::a('<span class="glyphicon glyphicon-pencil"></span>',Url::to(['/treemenu/update','id'=>$sub->id]),['title'=>'Update','aria-label'=>'Update','data-pjax'=>'0']).'
                '.Html::a('<span class="glyphicon glyphicon-trash"></span>',Url::to(['/treemenu/delete','id'=>$sub->id]),['title'=>'Delete','aria-label'=>'Delete','data-pjax'=>'0','data-confirm'=>'Are you sure you want to delete this item?', 'data-method'=>'post']).'
                </td>
                </tr>';
                $subed .= self::subs($sub->id,$tree.'-');
            }
        }

        return $subed;
    }

    /**delete subs */
    public function deletesubs($id){
        $subs = self::find()->where(['parent'=>$id])->all();
        if($subs!=null){
            foreach ($subs as $sub){
                self::deletesubs($sub->id);
                $sub->delete();
            }
        }
    }

    /** subs for menu */
    public function menusubs($id){
        $subs = self::find()->where(['parent'=>$id])->all();
        $subed = '';
        if($subs!=null){
            $subed .= '<ul class="treemenu-sub sub-'.$id.'">';
            foreach ($subs as $sub){
                $subed .= '<li>'.Html::a($sub->title,$sub->link).'</a>';
                $subed .= self::menusubs($sub->id);
                $subed .= '</li>';
            }
            $subed .= '</ul>';
        }

        return $subed;
    }
}
